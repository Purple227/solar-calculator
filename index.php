
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/9319d37366.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>

  </head>
  <body>
  <section class="section" id="app">
    <div class="container m-5 p-5">
    <div class="box">

<!-- Columns Container -->
    <div class="columns">

    <!-- First Column -->
  <div class="column">

  <div class="control has-icons-left has-text-success ">
  <div class="select">
    <select  v-model="selectedAppliance">
      <option selected> Select Appliances </option>
      <option v-for="(appliance, index) in Appliances" :value="appliance"> {{ appliance.name }} </option>
    </select>
  </div>
  <div class="icon is-small is-left has-text-success">
    <i class="fa-solid fa-bolt-lightning"></i>
  </div>
</div>

</div>
  <!-- First Column tag closes -->

  <!-- Second Column -->
  <div class="column">

  <div class="notification is-success">
  <button class="delete"></button>
  Primar lorem ipsum dolor sit amet, consectetu 
</div>


</div>
  <!-- Second column tag closes -->


</div>
<!-- Columns container element closes -->


</div>
    </div>
  </section>



  <script>
  Vue.createApp({
    data() {
      return {
        
      Appliances: [
{ name : 'light bulb (Incandescent)',  Wat :100},
{ name : '22 Inch LED TV',  Wat : 50 },
{ name :  '25 colour TV', Wat :150 }, 
{ name : '32 Inch LED TV',	Wat : 80 },
{ name : '42 Inch LED TV', Wat : 110 },
{ name : '46 Inch LED TV', Wat : 140 },
{ name : '49 Inch LED TV', Wat : 160 },
{ name : '55 Inch LED TV', Wat : 180 },
{ name : '60W light bulb (Incandescent)', Wat	:	60 },
{ name : '65 Inch LED TV', Wat : 210 },
{ name : '82 Inch LED TV', Wat : 355 },
{ name : 'Air Cooler',  Wat: 150 },
{name : 'Air Purifier', Wat : 30 },
{name : 'Amazon Echo', Wat : 20 },
{name : 'Amazon Echo Dot', Wat : 25 },
{ name : 'Amazon Echo Show', Wat : 35 },
{ name : 'Double Door Freezer, Refrigerator', Wat : 280 },
{ name : 'Apple TV', Wat : 250 },
{ name : 'Aquarium Pump', Wat : 250 },
{name : 'Ceiling Fan', Wat : 140 },
{ name : 'Chromebook', Wat : 85 },
{name : 'Chromecast', Wat : 12 },
{name : 'Clock radio', Wat : 20 },
{ name : 'Clothes Dryer', Wat  : 4000 },
{ name : 'Coffee Maker', Wat  : 240 },
{ name : 'Computer Monitor', Wat : 130 },
{ name : 'Corded Drill', Wat :	850 },
{ name : 'Corded Electric Handheld Blower', Wat	:	2500 },
{ name : 'Curling Iron', Wat : 250 },
{ name :'Big Deep Freezer', Wat : 900 },
{name : 'Medium Deep Freezer', Wat	: 650 },
{ name : 'Small Deep Freezer', Wat : 400 },
{ name : 'Dehumidifier', Wat : 240 },
{ name : 'Desktop Computer', Wat : 650 },
{ name : 'Dishwasher', Wat	:	1500 },
{ name : 'Domestic Water Pump', Wat : 700 },
{ name : 'DVD Player', Wat : 160 },
{ name : 'Electric Blanket', Wat : 200 },
{name : 'Electric Doorbell Transformer', Wat : 20 },
{ name : 'Electric Heater Fan', Wat  : 3000 },
{ name :'Electric Kettle', Wat : 3000 },
{ name : 'Electric Pressure Cooker', Wat : 1000 },
{name : 'Electric stove', Wat : 2000 },
{ name : 'Electric Tankless Water Heater', Wat	:	1700 },
{ name : 'Espresso Coffee Machine', Wat	:	500 },
{ name : 'Evaporative Air Conditioner', Wat	:	3100 },
{ name : 'External Hard Drive', Wat	:	10 },
{name : 'Extractor Fan', Wat	:	80 },
{ name : 'Fluorescent Lamp', Wat	:	75 },
{ name : 'Food Blender', Wat	:	1200 },
{ name : 'Food Dehydrator', Wat	:	800 },
{ name : 'Freezer', Wat	:	350 },
{ name : 'Fridge', Wat	:	420 },
{name : 'Fridge / Freezer', Wat	:	700 },
{ name : 'Fryer', Wat	:	1500 },
{ name : 'Game Console', Wat	:	500 },
{ name : 'Gaming PC', Wat	:	900 },
{ name : 'Garage Door Opener', Wat	:	600 },
{ name : 'Google Home Mini', Wat	:	50 },
{ name : 'Guitar Amplifier', Wat : 60 },
{ name : 'Hair Blow Dryer',	Wat :	2500 },
{ name : 'Hand Wash Oversink Water Heater',	Wat :	3000 },
{ name : 'Heated Bathroom Mirror', Wat	:	100 },
{ name : 'Heated Hair Rollers', Wat	:	700 },
{ name : 'Home Air Conditioner', Wat	:	4000 },
{ name : 'Home Internet Router', Wat	:	25 },
{ name : 'Home Phone', Wat	:	30 },
{ name :  'Home Sound System', Wat	:	195 },
{ name : 'Hot Water Dispenser', Wat	:	1800 },
{ name : 'Hot Water Immersion Heater', Wat	:	5000 },
{ name : 'Humidifier', Wat : 80 },
{ name : 'iMac',	Wat :	400 },
{ name : 'Inkjet Printer', Wat	:	200 },
{ name : 'Inverter Air conditioner', Wat	:	1400 },
{ name : 'Iron', Wat	:	1800 },
{ name : 'Jacuzzi', Wat	:	7500 },
{ name : 'Kitchen Extractor Fan',	Wat :	250 },
{ name : 'Laptop Computer', Wat	:	140 },
{name : 'Laser Printer', Wat	:	800 },
{ name : 'Lawnmower', Wat	:	1400 },
{ name : 'LED Christmas Lights', Wat	:	30 },
{ name : 'LED Light Bulb', Wat	:	30 },
{name : 'Mi Box', Wat	:	25 },
{ name : 'Microwave', Wat	:	2500 },
{ name : 'Night Light', Wat	:	20 },
{ name : 'Nintendo Switch AC Adapter', Wat	:	90 },
{ name : 'Outdoor Hot Tub',	Wat :	1000 },
{ name : 'Oven',	Wat :	2500 },
{ name : 'Paper Shredder', Wat	:	320 },
{ name : 'Pedestal Fan', Wat 	:	60 },
{name : 'Philips Hue Smart Bulb', Wat	:	19 },
{ name : 'Phone Charger', Wat	:	20 },
{ name : 'Playstation 4',	Wat :	200 },
{ name : 'Playstation 5', Wat	:	450 },
{ name : 'Portable Air Conditioner', Wat	:	1200 },
{ name : 'Pressure Cooker', Wat	:	700 },
{ name : 'Projector', Wat	:	270 },
{ name : 'Refrigerator', Wat	:	400 },
{ name : 'Rice Cooker', Wat	:	1200 },
{ name : 'Scanner', Wat :	180 },
{ name : 'Sewing Machine', Wat	:	350 },
{name : 'Singer Sewing Machine', Wat : 450 },
{name : 'Slow Cooker', Wat	:	480 },
{ name : 'Smoke Detector', Wat 	:	12 },
{ name : 'Steam Iron', Wat	:	2500 },
{ name : 'Steriliser', Wat	:	850 },
{ name : 'Straightening Iron', Wat	:	400 },
{ name : 'Table Fan', Wat	:	50 },
{name : 'Table Top Fridge', Wat	:	95 },
{ name : 'Tablet Charger', Wat	:	45 },
{name : 'Toaster', Wat 	:	2500 },
{ name : 'Treadmill', Wat	: 1200 },
{ name : 'Tube Light (1500mm)', Wat	:	40 },
{ name : 'TV (19" colour)', Wat	:	200 },
{ name : 'Vacuum Cleaner', Wat	:	1200 },
{ name : 'Wall Fan', Wat	:	90 },
{ name : 'Washing Machine', Wat	:	500 },
{ name : 'Water Feature', Wat	:	35 },
{name : 'Water Filter and Cooler', Wat : 200 },
{ name : 'WiFi Booster', Wat	:	19 },
{ name : 'WiFi Router',	 Wat :	25 },
{ name : 'Window Air Conditioner', Wat	:	1900 },
{ name : 'Xbox One',  Wat	: 210 }
      ],

selectedAppliance: null,
selectedApplianceArray: [{}]

      }
    },



    watch: {
    selectedAppliance() {
      this.addSelectedAppliances()
    }
  },


    methods: {

    addSelectedAppliances() {
       this.selectedApplianceArray.push({
				name: this.selectedAppliance.name,
				Wat: this.selectedAppliance.Wat,
			})

    },

    removeTodo(todo) {
      // ...
    }
  }



  }).mount('#app')
</script>


  </body>
</html>