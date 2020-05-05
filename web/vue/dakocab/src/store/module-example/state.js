export default function () {
  return {
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
