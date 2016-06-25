const SERVICES = new Map();

class Toolbar {
  constructor($state) {
    SERVICES.set('$state', $state);
  }
}

Toolbar.$inject = ['$state'];

export default Toolbar;
