<template>
   <section class="section">
      <h1>Members</h1>
      <div>
         <b-row>
            <b-col sm="5" md="6">
               <b-form-group
                     label="Filter"
                     label-cols-sm="3"
                     label-align-sm="right"
                     label-size="sm"
                     label-for="initialFilterSelect"
               >
                  <b-form-select
                        id="initialFilterSelect"
                        v-model="filter"
                        size="sm"
                        :options="['', 'Manager', 'Developer']"
                  ></b-form-select>
               </b-form-group>
            </b-col>

            <b-col sm="7" md="6">
               <b-pagination
                     v-model="currentPage"
                     :total-rows="totalRows"
                     :per-page="perPage"
                     align="fill"
                     size="sm"
               ></b-pagination>
            </b-col>
         </b-row>

         <b-table
               :fields="fields"
               :items="items"
               :current-page="currentPage"
               :per-page="perPage"
               :filter="filter"
               @filtered="onFiltered"
         >
            <template v-slot:cell(projects)="data">
               <div v-if="data.value.role === 'Manager'">
                  Added
                  <b-link href="#">{{data.value.projects}} projects</b-link>
               </div>
               <div v-if="data.value.role === 'Developer'">
                  Voted in
                  <b-link href="#">{{data.value.projects}} projects</b-link>
               </div>
            </template>
         </b-table>
      </div>
   </section>
</template>
<script>

    export default {
        data() {
            return {
                fields: [
                    {key: 'name', label: 'Full Name'},
                    // User role
                    'role',
                    {
                        key: 'projects',
                        label: 'Projects',
                        formatter: (value, key, item) => {
                            return {role: item.role, projects: value}
                        }
                    },
                    {key: 'actions', label: 'Actions'},
                ],
                items: [
                    {name: 'John Doe', role: 'Manager', projects: 4},
                    {name: 'John Doe', role: 'Developer', projects: 5},
                    {name: 'John Doe', role: 'Developer', projects: 1},
                    {name: 'John Doe', role: 'Developer', projects: 10},
                    {name: 'John Doe', role: 'Developer', projects: 7},
                    {name: 'John Doe', role: 'Manager', projects: 12},
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                filter: null,
            }
        },
        mounted() {
            // Set the initial number of items
            this.totalRows = this.items.length
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1
            },
        },
    }
</script>