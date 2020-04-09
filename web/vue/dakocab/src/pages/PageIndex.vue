<template>
  <q-page class="q-ma-md">
    <q-list bordered separator class="self-start">


    <q-item-label header>General</q-item-label>

    <q-item v-for="order in orders"
            :key="order.id"
            @click = "order.status = !order.status"
            clickable
             v-ripple
            :class = " !order.status ? 'bg-orange-11' : 'bg-light-green-2' ">
      <q-item-section side top>
        <q-checkbox v-model="order.status" /> {{ order.status }}
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


    </q-list>

  </q-page>
</template>

<script>
export default {
  // name: 'PageIndex',
    data(){
      return{
          check1: true,
          orders : [
                {
                id: 1,
                service_order: '23123service',
                order_dako: '33123dako',
                sum: '102.40',
                status: true,
                date_time_prepay: '2020-03-05 12:24:02',
                transaction_id: '1263584946',
                order_status: 'IN PROGRESS'
                },
              {
                  id: 2,
                  service_order: '2222service',
                  order_dako: 'dako222',
                  sum: '302.40',
                  status: false,
                  date_time_prepay: '2020-04-04 12:20:02',
                  transaction_id: '554345345',
                  order_status: 'IN PROGRESS'
              }
          ]
      }
    }
}
</script>
