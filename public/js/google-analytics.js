$(document).ready(function () {
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('consent', 'default', {
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'ad_storage': 'denied',
        'analytics_storage': 'denied',
        'wait_for_update': 500,
    });
    gtag('js', new Date());
    gtag('config', 'G-9GNB73DHJV');

    let gtagScript = document.createElement('script');
    gtagScript.async = true;
    gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-9GNB73DHJV';

    let firstScript = document.getElementsByTagName('script')[0];
    firstScript.parentNode.insertBefore(gtagScript, firstScript);

    const acceptCookiesHandler = () => {
        localStorage.setItem("consentGranted", "true");
        function gtag() { dataLayer.push(arguments); }

        gtag('consent', 'update', {
            ad_user_data: 'granted',
            ad_personalization: 'granted',
            ad_storage: 'granted',
            analytics_storage: 'granted'
        });

        sessionStorage.setItem('cookies-granted', 'true');
        hideCookieConsentForm();
    }

    const showCookieConsentForm = () => {
        $('#cookieConsentForm').addClass('show');
    }

    const hideCookieConsentForm = () => {
        $('#cookieConsentForm').removeClass('show');
    }

    $('#acceptCookieBtn').on('click', () => acceptCookiesHandler());
    $('#cancelCookieBtn').on('click', () => hideCookieConsentForm());

    if(!sessionStorage.getItem('cookies-granted')) {
        showCookieConsentForm();
    }
});
