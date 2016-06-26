const SERVICES = new Map();

class Notifications {
  constructor($state, usersService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService);

    this.notifications = [];
    SERVICES.get('usersService').me().then((result) => {
      this.notifications = result.data.notifications;
    });
  }
}

Notifications.$inject = ['$state', 'usersService'];

export default Notifications;
