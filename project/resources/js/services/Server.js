import axios from 'axios';

/**
 * Manage the Server operations.
 **/
export default {

    /**
     * Create server instance for requests.
     * @returns {AxiosInstance}
     */
    makeServer() {
        let url = 'http://crm.loc/api';
        let headers = {
            'Content-Type': 'application/json; charset=UTF-8',
            'Access-Control-Allow-Origin': '*'
        };
        let api_token = localStorage.getItem('api_token');
        if (api_token) {
            headers['Authorization'] = 'Bearer ' + api_token;
        }
        let server = axios.create({
            baseURL: url,
            timeout: 1000,
            headers: headers,
        });
        server.interceptors.response.use(
            (response) => {
                return response
            },
            (error) => {
                const originalRequest = error.config;
                // Token expired. Redirect user on login page and remove API token.
                if (null !== localStorage.getItem('api_token') && 401 === error.response.status) {
                    localStorage.removeItem('api_token');
                    window.location.path = '/login';
                    originalRequest._retry = true;
                }
                return Promise.reject(error);
            }
        );
        return server;
    }
};