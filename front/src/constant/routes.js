const skip = ($state, $auth) =>
  new Promise(resolve => {
    if ($auth.isAuthenticated()) {
      resolve();
    } else {
      $state.go('login');
    }
  });

const authenticator = ($q, $location, $auth) => {
  const deferred = $q.defer();

  if ($auth.isAuthenticated()) {
    deferred.resolve();
  } else {
    $location.path('/login');
  }

  return deferred.promise;
};

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
    resolve: { authenticator },
  },
  register: {
    name: 'register',
    url: '/register',
    template: '<register></register>',
    resolve: { skip },
  },
};

export default ROUTES;
