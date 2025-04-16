<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; color: #333;">
    <div style="max-width: 600px; margin: auto; padding: 20px; background: #fff; border-radius: 8px;">
        <h2 style="color: #D9C2A9;">💌 Nouveau message depuis Océan de Bijoux</h2>

        <p><strong>Nom :</strong> {{ $nom }}</p>
        <p><strong>Email :</strong> {{ $email }}</p>
        <p><strong>Message :</strong></p>
        <p style="margin-top: 10px; white-space: pre-line;">{{ $messageContact }}</p>

        <hr style="margin: 30px 0;">
        <p style="text-align: center; font-size: 14px; color: #999;">Cet email a été généré automatiquement depuis le formulaire de contact.</p>
    </div>
</body>
</html>
