import angular from 'angular';
import router from 'angular-ui-router';
import material from 'angular-material';
import storage from 'angular-storage';
import animate from 'angular-animate';
import aria from 'angular-aria';
import messages from 'angular-messages';
import satellizer from 'satellizer';

import services from './app.services';
import components from './app.components';
import directives from './app.directives';

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
    satellizer,
    services,
    components,
    directives,
  ])
  .config(($stateProvider, $locationProvider, $urlRouterProvider, $authProvider) => {
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
    $authProvider.loginUrl = '/api/authenticate';
  });

export default moduleName;
