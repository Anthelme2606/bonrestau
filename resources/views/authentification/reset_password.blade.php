<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Réinitialisation de mot de passe</title>
</head>
<body style="@keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        };font-family: 'Roboto', sans-serif; background-color: #fff; margin: 0; padding: 0; color: #333;">
    <div class="container" style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <div class="text-center" style="text-align:center;">
            <img src="{{ $message->embed(public_path('assets/images/logo-bonr.png')) }}" alt="image" style="width: 100px; height: 100px; animation: rotate 5s linear infinite;"/>
        </div>
        <div style="padding: 20px;">
            <p>Bonjour,</p>
            <p>Vous avez demandé de réinitialiser votre mot de passe. Veuillez utiliser le code ci-dessous pour réinitialiser votre mot de passe :</p>
            <div class="code" style="font-size: 24px; font-weight: bold; text-align: center; padding: 20px; background-color: #f8f9fa; border-radius: 8px; margin: 20px 0; border: 1px solid #ddd;">{{$code}}</div>
            <p>Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer cet email.</p>
            <p>Merci,</p>
            <p>L'équipe Support</p>
        </div>
        <div class="footer text-center" style="padding: 10px 0; font-size: 12px; color: #777;">
            &copy; Santé plus, Tous droits réservés.
        </div>
    </div>
</body>
</html>
