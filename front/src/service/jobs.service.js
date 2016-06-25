const SERVICES = new Map();

class JobsService {
  constructor($http, configService) {
    SERVICES
      .set('$http', $http)
      .set('configService', configService);

    this.apiUrl = SERVICES.get('configService').get('API_URL');
  }

  all() {
    return SERVICES.get('$http').get(`${this.apiUrl}/jobs`);
  }

  get(id) {
    return SERVICES.get('$http').get(`${this.apiUrl}/jobs/${id}`);
  }

  create(params) {
    return SERVICES.get('$http').post(`${this.apiUrl}/jobs`, params);
  }

  update(id, params) {
    return SERVICES.get('$http').put(`${this.apiUrl}/jobs/${id}`, params);
  }

  destroy(id) {
    return SERVICES.get('$http').delete(`${this.apiUrl}/jobs/${id}`);
  }

  /**
   * Factory of this class
   * @returns {JobsService}
   */
  static factory($http, configService) {
    return new JobsService($http, configService);
  }
}

JobsService.factory.$inject = ['$http', 'configService'];

export default JobsService;
