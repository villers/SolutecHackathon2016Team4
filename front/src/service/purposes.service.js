const SERVICES = new Map();

class PurposesService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/purposes`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/purposes/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/purposes`, params);
  }

  update(id, params) {
    return SERVICES.get('$http').put(`${this.apiUrl}/purposes/${id}`, params);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/purposes/${id}`);
  }

  /**
   * Factory of this class
   * @returns {PurposesService}
   */
  static factory($http, configService) {
    return new PurposesService($http, configService);
  }
}

PurposesService.factory.$inject = ['$http', 'configService'];

export default PurposesService;
