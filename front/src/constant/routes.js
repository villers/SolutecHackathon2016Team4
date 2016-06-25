export const ROUTES = {
  default: '/',
  layout: {
    abstract: true,
    template: '<layout></layout>',
  },
  'layout.default': {
    abstract: true,
    views: {
      toolbar: {
        template: '<toolbar></toolbar>',
      },
      content: {
        template: '<div flex ui-view></div>',
      },
      belowContent: {
        template: '<div ui-view="belowContent"></div>',
      },
    },
  },
  'layout.default.login': {
    name: 'login',
    url: '/auth',
    template: '<netflix-login></netflix-login>',
  },
  'layout.default.dashboard': {
    name: 'home',
    url: '/',
    template: '<netflix-home></netflix-home>',
  },
};

export default ROUTES;
