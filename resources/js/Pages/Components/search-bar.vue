<script>
export default {
    props: ["route"],
    data() {
        return {
            search: "",
        };
    },
    watch: {
        search() {
            this.$inertia.get(
                this.route,
                {
                    search: this.search,
                },
                {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true,
                }
            );
        },
    },
};
</script>

<template>
    <div
        id="dataTable_filter"
        class="text-md-end d-flex justify-content-end dataTables_filter"
    >
        <div class="bg-white border rounded d-flex align-items-center overflow-hidden">
            <input
                class="border-0 shadow-none form-control form-control-sm"
                type="search"
                aria-controls="dataTable"
                placeholder="Search"
                v-model="search"
            />
        </div>
    </div>
</template>
