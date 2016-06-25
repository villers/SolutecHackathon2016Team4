const SERVICES = new Map();

class Layout {
  constructor($state) {
    SERVICES.set('$state', $state);
  }
}

Layout.$inject = ['$state'];

export default Layout;
