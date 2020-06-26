<template>


    <q-item
            to = "/details"
            clickable
            v-ripple
            :class = " !order.status ? 'bg-orange-11' : 'bg-light-green-2' ">
        <q-item-section side top>
            <q-checkbox v-model="order.status"

                @click = "updateTask({
                id: id,
                updates: {
                    status: !order.status
                }
                })"
            /> {{ order.status }} {{ id }}
        </q-item-section>

        <q-item-section

            >
            <q-item-label>{{ order.id }}</q-item-label>

            <q-item-label

                    caption
                    :class="{'text-strikethrough' : order.status}">
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
        <q-item-section side >
            <q-btn
                    @click.stop="promptToDelete(id)"
                    dense
                    flat
                   round
                   color="red"
                   icon="delete_forever" />
        </q-item-section>
    </q-item>

</template>

<script>
    import { mapActions } from 'vuex'
    export default {
        name: "Tasks.vue",
        props: ['order', 'id'],
        methods: {
            ...mapActions('orders', ['updateTask', 'deleteTask']),
            promptToDelete(id){
                this.confirm(id);
            },
            confirm (id) {
                this.$q.dialog({
                    title: 'Confirm',
                    message: 'Really delete?',
                    cancel: true,
                    persistent: true
                }).onOk(() => {
                     console.log('>>>> OK', id)
                    this.deleteTask(id);

                }).onCancel(() => {
                    // console.log('>>>> Cancel')
                }).onDismiss(() => {
                    // console.log('I am triggered on both OK and Cancel')
                })
            }
        }

    }
</script>

<style scoped>

</style>