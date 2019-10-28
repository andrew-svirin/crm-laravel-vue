import Server from '../services/Server.js'

/**
 * Manage the Project Member operations.
 **/
export default {

    /**
     * Make invoice member to the project request.
     * @param form
     */
    invoice: form => Server.makeServer().post('projects/members/invoice', form),

};
