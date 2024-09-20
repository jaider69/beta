<?php
  // Array de chistes
$jokes = [
    "¿Por qué los pájaros no usan Facebook? ¡Porque ya tienen Twitter!",
    "¿Qué le dice una iguana a su hermana gemela? ¡Iguanita!",
    "¿Cómo maldice un pollito a otro pollito? ¡¡¡¡Que te pongan en la plancha!!!",
    "¿Qué hace una abeja en el gimnasio? ¡Zum-ba!",
    "¿Por qué los esqueletos no pelean entre ellos? ¡Porque no tienen agallas!"
];

// Elegir un chiste aleatorio
$randomIndex = array_rand($jokes);
$randomJoke = $jokes[$randomIndex];

// Mostrar el chiste
echo "<h1>Chiste del día:</h1>";
echo "<p>$randomJoke</p>";

   ?>