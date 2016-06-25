const SERVICES = new Map();

class NetflixLogin {
  constructor($state) {
    SERVICES.set('$state', $state);
  }
}

NetflixLogin.$inject = ['$state'];

export default NetflixLogin;
