import angular from 'angular';
import router from 'angular-ui-router';
import material from 'angular-material';
import storage from 'ngstorage';
import animate from 'angular-animate';
import aria from 'angular-aria';

import services from './app.services';
import components from './app.components';

import ROUTES from './constant/routes';

const moduleName = 'app';

angular
    .module(moduleName, [router, aria, animate, storage, material, services, components])
    .config(($stateProvider, $locationProvider, $urlRouterProvider) => {
      $locationProvider.html5Mode(true);
      $urlRouterProvider.otherwise(ROUTES.default);

      Object
          .keys(ROUTES)
          .filter(route => route !== 'default')
          .forEach(route => $stateProvider.state(route, ROUTES[route]));
    });

export default moduleName;
