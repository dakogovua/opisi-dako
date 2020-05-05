<template>


    <q-item @click = "updateTask({
        id: id,
        updates: {
            status: !order.status
        }
    })"

            clickable
            v-ripple
            :class = " !order.status ? 'bg-orange-11' : 'bg-light-green-2' ">
        <q-item-section side top>
            <q-checkbox v-model="order.status" /> {{ order.status }} {{ id }}
        </q-item-section>

        <q-item-section>
            <q-item-label>{{ order.id }}</q-item-label>

            <q-item-label caption
                          :class="{'text-strikethrough' : order.status}"
            >
                {{order.service_order}}
            </q-item-label>
        </q-item-section>

        <q-item-section side >
            <div class="row">
                <div class="column justify-center">
                    <q-icon name="warning"
                            class="q-mr-xs"/>
                </div>

                <div class="column">
                    <q-item-label caption class="justify-end">
                        {{ order.date_time_prepay }}
                    </q-item-label>
                </div>
            </div>
        </q-item-section>

    </q-item>

</template>

<script>
    import { mapActions } from 'vuex'
    export default {
        name: "Tasks.vue",
        props: ['order', 'id'],
        methods: {
            ...mapActions('orders', ['updateTask'])
        }

    }
</script>

<style scoped>

</style>