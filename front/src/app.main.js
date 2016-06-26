import angular from 'angular';
import router from 'angular-ui-router';
import material from 'angular-material';
import storage from 'angular-storage';
import animate from 'angular-animate';
import aria from 'angular-aria';
import messages from 'angular-messages';
import satellizer from 'satellizer';

require('lf-ng-md-file-input');

import services from './app.services';
import components from './app.components';
import directives from './app.directives';
import theme from './app.theme';

import ROUTES from './constant/routes';
import CONFIG from './constant/config';

const moduleName = 'app';

angular
  .module(moduleName, [
    router,
    aria,
    animate,
    storage,
    material,
    messages,
    'lfNgMdFileInput',
    satellizer,
    theme,
    services,
    components,
    directives,
  ])
  .config(($stateProvider, $locationProvider, $urlRouterProvider,
           $authProvider, storeProvider, $sceDelegateProvider) => {
    $locationProvider.html5Mode(true);

    // Redirect to default state if any other states
    $urlRouterProvider.otherwise(ROUTES.default);

    // Load route from constant/routes.js
    Object
      .keys(ROUTES)
      .filter(route => route !== 'default')
      .forEach(route => $stateProvider.state(route, ROUTES[route]));

    // Satellizer configuration that specifies which API
    $authProvider.baseUrl = CONFIG.API_URL;
    $authProvider.loginUrl = '/authenticate/login';
    $authProvider.signupUrl = '/authenticate/register';

    // Configure default SessionStorage
    storeProvider.setStore('sessionStorage');

    $sceDelegateProvider.resourceUrlWhitelist(['**']);
  })
  .run(($auth, $rootScope, store) => {
    if ($auth.isAuthenticated()) {
      $rootScope.currentUser = store.get('currentUser');
    }
  });

export default moduleName;
