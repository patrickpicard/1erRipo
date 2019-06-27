<?php

session_destroy();
$titre="Déconnexion";
echo '<div class="verticalSpace2"></div>';
echo "<div>Vous êtes à présent déconnecté.</div>";
echo '<div class="verticalSpace2"></div>';
echo '<div class="verticalSpace2"></div>';
echo '<div class="verticalSpace2"></div>';
echo '<div class="verticalSpace2"></div>';
header("refresh:3;url=Routes.php");