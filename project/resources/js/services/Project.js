import Server from '../services/Server.js'

/**
 * Manage the Project operations.
 **/
export default {

    /**
     * Make create project request.
     * @param form
     */
    create: form => Server.makeServer().post('projects/create', form),
};
