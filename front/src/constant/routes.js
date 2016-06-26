function skip($location, $auth) {
  return new Promise((resolve, reject) => {
    if ($auth.isAuthenticated()) {
      $location.path('home');
      reject();
    } else {
      resolve();
    }
  });
}

function authenticator($location, $auth) {
  return new Promise(resolve => {
    if ($auth.isAuthenticated()) {
      resolve();
    } else {
      $location.path('/auth');
    }
  });
}

export const ROUTES = {
  default: '/',
  dashboard: {
    name: 'home',
    url: '/',
    template: '<home></home>',
    resolve: { authenticator },
  },
  login: {
    name: 'login',
    url: '/auth',
    template: '<login></login>',
    resolve: { skip },
  },
  register: {
    name: 'register',
    url: '/register',
    template: '<register></register>',
    resolve: { skip },
  },
  logout: {
    name: 'logout',
    url: '/logout',
    controller: ($auth, $state, $rootScope, store) => {
      $auth.logout();

      delete $rootScope.currentUser;
      store.remove('currentUser');

      $state.go('login');
    },
    resolve: { authenticator },
  },
  profil: {
    name: 'profil',
    url: '/profil',
    template: '<profil></profil>',
    resolve: { authenticator },
  },
  makeCv: {
    name: 'makeCv',
    url: '/make-cv',
    template: '<make-cv></make-cv>',
    resolve: { authenticator },
  },
  achievements: {
    name: 'achievements',
    url: '/achievements',
    template: '<achievements></achievements>',
    resolve: { authenticator },
  },
  notifications: {
    name: 'notifications',
    url: '/notifications',
    template: '<notifications></notifications>',
    resolve: { authenticator },
  },
  purposes: {
    name: 'purposes',
    url: '/purposes',
    template: '<purposes></purposes>',
    resolve: { authenticator },
  },
  comparator: {
    name: 'comparator',
    url: '/comparator',
    template: '<comparator></comparator>',
    resolve: { authenticator },
  },
};

export default ROUTES;

