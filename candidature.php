<?php
$prenom    = '';
$nom       = '';
$email     = '';
$age       = '';
$filiere   = '';
$motivation = '';
$erreurs   = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $prenom     = $_POST['prenom']     ?? '';
    $nom        = $_POST['nom']        ?? '';
    $email      = $_POST['email']      ?? '';
    $age        = $_POST['age']        ?? '';
    $filiere    = $_POST['filiere']    ?? '';
    $motivation = $_POST['motivation'] ?? '';

    $reglement = isset($_POST['reglement']);

    if (empty($prenom)) {
    $erreurs[] = "Le prénom est obligatoire.";
    }

    if (empty($nom)) {
    $erreurs[] = "Le nom est obligatoire.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'adresse email est invalide.";
    }
    
    if (!is_numeric($age) || $age < 16 || $age > 30) {
    $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    }

    if (empty($filiere)) {
    $erreurs[] = "Veuillez choisir une filière.";
    }

    if (strlen($motivation) < 30) {
    $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }

    if (!$reglement) {
    $erreurs[] = "Vous devez accepter le règlement.";
    }


}

?>
<!DOCTYPE html>
<html lang="fr">
<head>


    <meta charset="UTF-8">
    <title>Candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (empty($erreurs) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <!-- ÉTAPE 7 : FICHE DE CONFIRMATION -->
    <h1>Candidature reçue !</h1>

    <ul>
        <li>Prénom : <?php echo $prenom; ?></li>
        <li>Nom : <?php echo $nom; ?></li>
        <li>Email : <?php echo $email; ?></li>
        <li>Âge : <?php echo $age; ?></li>
        <li>Filière : <?php echo $filiere; ?></li>
    </ul>

    <p>Lettre de motivation :</p>
    <p><?php echo $motivation; ?></p>

    <p>Votre candidature a bien été enregistrée. Nous vous contacterons à l'adresse indiquée.</p>

    <a href="candidature.php">Soumettre une nouvelle candidature</a>

<?php else: ?>

<?php if (!empty($erreurs)): ?>
<ul class="erreurs">
    <?php foreach ($erreurs as $e): ?>
        <li><?php echo $e; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="candidature.php" method="POST">

<label>Prénom :</label>
<input type="text" name="prenom" value="<?php echo $prenom; ?>">

<label>Nom :</label>
<input type="text" name="nom" value="<?php echo $nom; ?>">

<label>Email :</label>
<input type="email" name="email" value="<?php echo $email; ?>">

<label>Âge :</label>
<input type="number" name="age" value="<?php echo $age; ?>">

<label>Filière :</label>
<select name="filiere">
    <option value="">-- Choisir --</option>
    <option value="Informatique" <?php echo ($filiere === 'Informatique') ? 'selected' : ''; ?>>Informatique</option>
    <option value="Électronique" <?php echo ($filiere === 'Électronique') ? 'selected' : ''; ?>>Électronique</option>
    <option value="Mécanique" <?php echo ($filiere === 'Mécanique') ? 'selected' : ''; ?>>Mécanique</option>
    <option value="Autre" <?php echo ($filiere === 'Autre') ? 'selected' : ''; ?>>Autre</option>
</select>

<label>Motivation :</label>
<textarea name="motivation"><?php echo $motivation; ?></textarea>

<label>
<input type="checkbox" name="reglement" value="1"
<?php echo $reglement ? 'checked' : ''; ?>>
J'ai lu et j'accepte le règlement!
</label>

<button type="submit">Envoyer</button>

</form>

<?php endif; ?>
</body>
</html>