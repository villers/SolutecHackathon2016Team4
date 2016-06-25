export const ROUTES = {
  default: '/',
  login: {
    name: 'login',
    url: '/auth',
    template: '<netflix-login></netflix-login>',
  },
  dashboard: {
    name: 'home',
    url: '/',
    template: '<netflix-home></netflix-home>',
  },
};

export default ROUTES;
