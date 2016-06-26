const SERVICES = new Map();

class UsersService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  me() {
    return SERVICES.get('$http').get(`${this.apiUrl}/authenticate/me`);
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

  country() {
    return SERVICES.get('$http').get(`${this.apiUrl}/country`);
  }

  upload(params, headers) {
    return SERVICES.get('$http').post(`${this.apiUrl}/upload/avatar`, params, headers);
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
