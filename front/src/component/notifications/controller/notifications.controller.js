const SERVICES = new Map();

class Notifications {
  constructor($state, usersService, notificationsService) {
    SERVICES
      .set('$state', $state)
      .set('usersService', usersService)
      .set('notificationsService', notificationsService);

    this.notifications = [];
    SERVICES.get('usersService').me().then((result) => {
      this.notifications = result.data.notifications;
    });
  }
  update(id) {
    console.log(id);
    SERVICES.get('notificationsService').update(id).then((result) => {
      this.notifications = result.data.notifications;
    });
  }
}

Notifications.$inject = ['$state', 'usersService', 'notificationsService'];

export default Notifications;
