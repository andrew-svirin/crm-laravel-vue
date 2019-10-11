import Server from '../services/Server.js'

/**
 * Manage the User operations.
 **/
export default {

    /**
     * Make login request.
     * @param form
     */
    login: form => Server.makeServer().post('login', form),
};
