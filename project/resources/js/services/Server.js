import axios from 'axios';

/**
 * Manage the Server operations.
 **/
const ServerService = {

    /**
     * Create server instance for requests.
     * @returns {AxiosInstance}
     */
    makeServer() {
        let url = 'http://crm.loc/api';
        let api_token = localStorage.getItem('api_token');
        if (api_token) {
            url += '?api_token=' + api_token;
        }
        return axios.create({
            baseURL: url,
            timeout: 1000,
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
                'Access-Control-Allow-Origin': '*'
            }
        });
    }

};

export default ServerService