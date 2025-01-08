<?php
function nav_item (string $lien, string $titre, string $linkClass = ''): string 
{
  $classe = 'nav-itam'; 
  if ($_SERVER['SCRIPT_NAME'] === $lien) {
    $classe = $classe . ' active';
  }
return <<<HTML
<li class="$classe">
  <a class="$linkClass $classe"  aria-current="page" href="$lien">$titre</a>
</li>
HTML;
}

function nav_menu (string $linkClass = ''): string 
{
    return 
      nav_item('/index.php', 'Acceuil', $linkClass) . 
      nav_item('/menu.php', 'Menu', $linkClass) .
      nav_item('/contact.php', 'Contact', $linkClass);
}

function checkbox (string $name, string $value, array $data): string
{
    $attributes = ''; //sting vide par def 
    if (isset($data[$name]) && in_array($value, $data[$name])) {
      $attributes .= 'checked'; //ajoute checked si case cochée
    } 
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
    HTML; 
}

function radio (string $name, string $value, array $data): string
{
    $attributes = ''; //sting vide par def 
    if (isset($data[$name]) && $value === $data[$name]) {
      $attributes .= 'checked'; //ajoute checked si case cochée
    } 
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attributes> 
    HTML; 
}

function select (string $name, $value, array $options): string {
  $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k == $value ? ' selected' : ''; 
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select cless='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function dump ($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
}

function creneaux_html (array $creneaux) {
    if (empty($creneaux)) {
      return 'Fermé'; 
    }
    $phrases = [];
    foreach ($creneaux as $creneau) {
      $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>"; 
    }
    return 'Ouvert ' . implode(' et ', $phrases); 
}

function in_crenaux (int $heure, array $creneaux): bool
{
    foreach ($creneaux as $creneau) {
      $debut = $creneau[0];
      $fin = $creneau[1];
      if ($heure >= $debut && $heure < $fin) {
        return true; 
      }
    }
    return false; 
}