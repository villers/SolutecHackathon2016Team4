import angular from 'angular';

const moduleName = 'app.theme';

angular
  .module(moduleName, [])
  .config(($mdThemingProvider) => {
    $mdThemingProvider
      .definePalette('customPrimary', {
        50: '#a6f3fa',
        100: '#5ee8f6',
        200: '#29e1f3',
        300: '#0bb8c9',
        400: '#0a9eac',
        500: '#08838f',
        600: '#066872',
        700: '#054e55',
        800: '#033338',
        900: '#02191b',
        A100: '#a6f3fa',
        A200: '#5ee8f6',
        A400: '#0a9eac',
        A700: '#054e55',
        contrastDefaultColor: 'light',
        contrastDarkColors: '50 100 200 300 A100 A200',
      })
      .definePalette('customAccent', {
        50: '#858585',
        100: '#5e5e5e',
        200: '#424242',
        300: '#1f1f1f',
        400: '#0f0f0f',
        500: '#000000',
        600: '#000000',
        700: '#000000',
        800: '#000000',
        900: '#000000',
        A100: '#858585',
        A200: '#5e5e5e',
        A400: '#0f0f0f',
        A700: '#000000',
        contrastDefaultColor: 'light',
        contrastDarkColors: '50 A100',
      })
      .definePalette('customBackground', {
        50: '#ffffff',
        100: '#ffffff',
        200: '#ffffff',
        300: '#ffffff',
        400: '#fdfdfd',
        500: '#eeeeee',
        600: '#dfdfdf',
        700: '#cfcfcf',
        800: '#c0c0c0',
        900: '#b1b1b1',
        A100: '#ffffff',
        A200: '#ffffff',
        A400: '#fdfdfd',
        A700: '#cfcfcf',
        contrastDefaultColor: 'light',
        contrastDarkColors: '50 100 200 300 400 500 600 700 800 900 A100 A200 A400 A700',
      });

    $mdThemingProvider.theme('default')
      .primaryPalette('teal');
  });

export default moduleName;
