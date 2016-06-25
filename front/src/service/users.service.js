const SERVICES = new Map();

class UsersService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/users`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/users/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/users`, params);
  }

  update(id, params) {
    return SERVICES.get('$http').put(`${this.apiUrl}/users/${id}`, params);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/users/${id}`);
  }

  register(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/register`, params);
  }

  /**
   * Factory of this class
   * @returns {UsersService}
   */
  static factory($http, configService) {
    return new UsersService($http, configService);
  }
}

UsersService.factory.$inject = ['$http', 'configService'];

export default UsersService;
