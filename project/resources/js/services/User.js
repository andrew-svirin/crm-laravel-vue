import Server from '../services/Server.js'

/**
 * Manage the User operations.
 **/
const UserService = {

    /**
     * Make login request.
     * @param form
     */
    postLogin: form => Server.makeServer().post('login', form),
};

export default UserService
