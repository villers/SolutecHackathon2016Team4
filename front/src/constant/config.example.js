export const ENV = 'PRODUCTION';
export const DEBUG = (ENV !== 'PRODUCTION');
export const API_URL = 'http://localhost:80/api/';

export default { ENV, DEBUG, API_URL };
