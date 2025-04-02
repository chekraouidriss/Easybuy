<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de paiement - EasyBuy</title>
    <style>
        .code { 
            font-size: 24px; 
            font-weight: bold;
            letter-spacing: 2px;
            color: #2d3748;
            margin: 20px 0;
            padding: 10px;
            background: #f7fafc;
            display: inline-block;
            border: 1px dashed #cbd5e0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #718096;
        }
    </style>
</head>
<body>
    <h2 style="color: #2d3748;">Confirmation de votre commande</h2>
    <p>Bonjour,</p>
    <p>Voici votre code de confirmation pour finaliser votre paiement :</p>
    
    <div class="code">{{ $verificationCode }}</div>
    
    <p>Ce code est valable pendant <strong>15 minutes</strong>.</p>
    <p>Si vous n'avez pas effectué cette demande, veuillez ignorer cet email.</p>
    
    <div class="footer">
        <p>Cordialement,<br>L'équipe EasyBuy</p>
        <p><small>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</small></p>
    </div>
</body>
</html>