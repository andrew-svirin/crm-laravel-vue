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
        return axios.create({
            baseURL: url,
            timeout: 1000,
            headers: headers,
        });
    }
};