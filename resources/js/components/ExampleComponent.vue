<template>
    <div>
        <h1> Datassdssdsd </h1>

        <Sortable :records="records">
            <template slot-scope="{ records }">
                <table class="table table-sm table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th> # </th>
                            <th> Title </th>
                            <th> Controls </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(record, index) in records" :key="record.id">
                            <td> {{ index + 1 }} </td>
                            <td> {{ record.title }} </td>
                            <td>
                                <button> Test </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </template>
        </Sortable>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                records: window.posts
            }
        }
    }
</script>
