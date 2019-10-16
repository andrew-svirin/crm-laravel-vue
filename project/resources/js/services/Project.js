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

    /**
     * Load multiple projects.
     */
    loadAll: (page, size, filter) => Server.makeServer().get('projects' + Server.buildQuery({
        page: page,
        size: size,
        filter: filter
    })),

    /**
     * Load one project by id.
     * @param id
     * @returns {Promise<AxiosResponse<T>>}
     */
    load: id => Server.makeServer().get('projects/' + id),
};
