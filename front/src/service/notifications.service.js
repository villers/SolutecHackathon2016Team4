const SERVICES = new Map();

class NotificationsService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/notifications`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/notifications/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/notifications`, params);
  }

  update(id, params) {
    return SERVICES.get('$http').put(`${this.apiUrl}/notifications/${id}`, params);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/notifications/${id}`);
  }

  /**
   * Factory of this class
   * @returns {NotificationsService}
   */
  static factory($http, configService) {
    return new NotificationsService($http, configService);
  }
}

NotificationsService.factory.$inject = ['$http', 'configService'];

export default NotificationsService;
