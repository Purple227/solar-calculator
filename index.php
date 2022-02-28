<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/9319d37366.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  </head>
  <body>
  <section class="section" id="app">
    <div class="container">
    <div class="box">

<!-- Columns Container -->
    <div class="columns">

    <!-- First Column -->
  <div class="column">

  <div class="control has-icons-left has-text-success ">
  <div class="select">
    <select v-model="selectedAppliance">
      <option :value="null" disabled="">Select Appliance</option>
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

<div class="box">


<div class="notification is-light m-2 p-2" v-for="(selectedLoad, index) in allSelectedAppliance" :key="index" v-if="allSelectedAppliance != 0"> <!-- Notifacatin tag open -->
						<button class="delete ml-4" @click="removeSelectedAppliances(selectedLoad.id)"> </button>

						<div class="columns"> <!-- Columns wrapper tag open -->

							<div class="column"> <!-- First column tag open -->
								<div class="content">
									<strong> {{ selectedLoad.name }} </strong>
								</div>
							</div> <!-- First column tag close -->


							<div class="column"> <!-- Second column tag open -->

								<div class="content"> <!-- Content tag open -->

									<div class="buttons has-addons ">

										<span class="button is-small" @click="decrementApplianceCounter(selectedLoad.id, selectedLoad.name, selectedLoad.Wat, selectedLoad.count)"> <i class="fas fa-minus"> </i>  </span>


										<span class="button is-small orange is-bold is-pulled-right"> {{ selectedLoad.count  }} </span>


										<span class="button is-small " @click="incrementApplianceCounter(selectedLoad.id, selectedLoad.name, selectedLoad.Wat, selectedLoad.count)"> <i class="fas fa-plus"> </i> </span>

									</div>

								</div> <!-- Content tag close -->

							</div> <!-- Second column tag close -->


						</div> <!-- Columns wrapper tag close -->

					</div> <!-- Notifacatin tag close -->

<div class="box" v-else="">
  Please kindly selected the appliances You will be using from the dropdown. Thanks Bitch
</div>
</div>

<!-- Button -->
<button class="button is-success is-centered" @click="modalFlip()" :disabled="allSelectedAppliance == 0">
    <span class="icon is-small">
      <i class="fas fa-check"></i>
    </span>
    <span> Result </span>
  </button>




  <div class="modal is-active" v-if="isActive">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title" v-if="resultStatus == false"> Hi just fill this form to get result. </p>
      <p class="modal-card-title" v-else=""> Here is your result. </p>
      <button class="delete" aria-label="close" @click="modalFlip()"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->

<!-- Form container -->      
<div v-if="resultStatus == false">

<div class="field">
  <p class="control has-icons-left">
    <input class="input" v-model="form.name" name="name" type="text" placeholder="Enter Name">
    <span class="icon is-small is-left">
      <i class="fa-solid fa-user"></i>
    </span>
  </p>
</div>

<div class="field">
  <p class="control has-icons-left">
    <input class="input" v-model="form.email" type="email" name="email" placeholder="Email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
  </p>
</div>

<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="tel" v-model="form.phone" name="phone" placeholder="Phone">
    <span class="icon is-small is-left">
      <i class="fa-solid fa-phone"></i>
    </span>
  </p>
</div>

</div>
<!-- Form container close -->      

<!-- Parent column open -->
<div class="columns" v-if="resultStatus == true">

<!-- First column open -->
<div class="column">

<div class="card">
<header class="card-header p-3">
<p class="is-bold title is-size-4">
		Selected Appliance 
</p>
</header>

<div class="content mt-2">
<table class="table is-bordered">
  <thead>
    <tr>
    <th> Name </th>
    <th> Quantity </th>
    </tr>
  </thead>

  <tbody>
    <tr v-for="(appliance, index) in allSelectedAppliance" :key="index">
    <th class="has-text-weight-light">  {{ appliance.name }} </th>
    <th class="has-text-weight-light">  {{ appliance.count }} </th>
    </tr>
    </tbody>
</table>
</div>

<footer class="card-footer">
    <p class="card-footer-item is-bold title is-size-4"> Total Load = {{totalLoadWat}} W </p>
  </footer>

</div>


</div>
<!-- First column close -->


<!-- Second column open -->
<div class="column">

<div class="card">

<header class="card-header">
<p class="is-bold title is-size-4 p-2 m-2">
Recommendation 
</p>
</header>

<div class="content is-centered is-size-5 p-5 mb-0" v-if="inventerType != false">
Inverter = <strong> {{ inventerType.type }}KVA </strong>
<br>
Battery (220amp) = <strong> {{ inventerType.battery }} </strong>
<br>
Solar Panel (280w) = <strong> {{ solarPanel }} </strong>
</div>

<div class="content mt-0 p-3" v-else="">
<strong> Note: </strong> Your total load from selected appliances requires a custom inspection and quote. Kindly give us a call on 07041384671 or 08167984003 for a proper recommendation.
</div>

<div class="content mt-0 p-3" v-if="inventerType != false">
<strong> Note: </strong> This is only a recommendation based on the selected appliances. For accurate estimate call:07041384671 or 08167984003 if you prefer mail you can mail us support@247energy.com
</div>

</div>

</div>
<!-- Second column close -->


</div>
<!-- Parent column close -->


    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" :disabled="form.name == null || form.email.length <= 5 || form.phone.length <= 8 || resultStatus == true" name="submit" type="submit" @click="showResult"> Get result </button>
      <button class="button" @click="modalFlip()">Cancel</button>
    </footer>
  </div>
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
        
      Appliances: 
[
{id : 1, name : 'light bulb (Incandescent)',  Wat :100},
{id : 2, name : '22 Inch LED TV',  Wat : 50 },
{id : 3, name : '25 colour TV', Wat :150 }, 
{id : 4, name : '32 Inch LED TV',	Wat : 80 },
{id : 5, name : '42 Inch LED TV', Wat : 110 },
{id : 6, name : '46 Inch LED TV', Wat : 140 },
{id : 7, name : '49 Inch LED TV', Wat : 160 },
{id : 8, name : '55 Inch LED TV', Wat : 180 },
{id : 9, name : '60W light bulb (Incandescent)', Wat	:	60 },
{id : 10, name : '65 Inch LED TV', Wat : 210 },
{id : 11, name : '82 Inch LED TV', Wat : 355 },
{id : 12, name : 'Air Cooler',  Wat: 150 },
{id : 13, name : 'Air Purifier', Wat : 30 },
{id : 14, name : 'Amazon Echo', Wat : 20 },
{id : 15, name : 'Amazon Echo Dot', Wat : 25 },
{id : 16, name : 'Amazon Echo Show', Wat : 35 },
{id : 17, name : 'Double Door Freezer, Refrigerator', Wat : 280 },
{id : 18, name : 'Apple TV', Wat : 250 },
{id : 19, name : 'Aquarium Pump', Wat : 250 },
{id : 20, name : 'Ceiling Fan', Wat : 140 },
{id : 21, name : 'Chromebook', Wat : 85 },
{id : 22, name : 'Chromecast', Wat : 12 },
{id : 23, name : 'Clock radio', Wat : 20 },
{id : 24, name : 'Clothes Dryer', Wat  : 4000 },
{id : 25, name : 'Coffee Maker', Wat  : 240 },
{id : 26, name : 'Computer Monitor', Wat : 130 },
{id : 27, name : 'Corded Drill', Wat :	850 },
{id : 28, name : 'Corded Electric Handheld Blower', Wat	:	2500 },
{id : 29, name : 'Curling Iron', Wat : 250 },
{id : 30, name :'Big Deep Freezer', Wat : 900 },
{id : 31, name : 'Medium Deep Freezer', Wat	: 650 },
{id : 32, name : 'Small Deep Freezer', Wat : 400 },
{id : 33, name : 'Dehumidifier', Wat : 240 },
{id : 34, name : 'Desktop Computer', Wat : 650 },
{id : 35, name : 'Dishwasher', Wat	:	1500 },
{id : 36, name : 'Domestic Water Pump', Wat : 700 },
{id : 37, name : 'DVD Player', Wat : 160 },
{id : 38, name : 'Electric Blanket', Wat : 200 },
{id : 38, name : 'Electric Doorbell Transformer', Wat : 20 },
{id : 39, name : 'Electric Heater Fan', Wat  : 3000 },
{id : 40, name :'Electric Kettle', Wat : 3000 },
{id : 41, name : 'Electric Pressure Cooker', Wat : 1000 },
{id : 42, name : 'Electric stove', Wat : 2000 },
{id : 43, name : 'Electric Tankless Water Heater', Wat	:	1700 },
{id : 44, name : 'Espresso Coffee Machine', Wat	:	500 },
{id : 45, name : 'Evaporative Air Conditioner', Wat	:	3100 },
{id : 46, name : 'External Hard Drive', Wat	:	10 },
{id : 47, name : 'Extractor Fan', Wat	:	80 },
{id : 48, name : 'Fluorescent Lamp', Wat	:	75 },
{id : 49, name : 'Food Blender', Wat	:	1200 },
{id : 50, name : 'Food Dehydrator', Wat	:	800 },
{id : 51, name : 'Freezer', Wat	:	350 },
{id : 52, name : 'Fridge', Wat	:	420 },
{id : 53, name : 'Fridge / Freezer', Wat	:	700 },
{id : 54, name : 'Fryer', Wat	:	1500 },
{id : 55, name : 'Game Console', Wat	:	500 },
{id : 56, name : 'Gaming PC', Wat	:	900 },
{id : 57, name : 'Garage Door Opener', Wat	:	600 },
{id : 58, name : 'Google Home Mini', Wat	:	50 },
{id : 59, name : 'Guitar Amplifier', Wat : 60 },
{id : 60, name : 'Hair Blow Dryer',	Wat :	2500 },
{id : 61, name : 'Hand Wash Oversink Water Heater',	Wat :	3000 },
{id : 62, name : 'Heated Bathroom Mirror', Wat	:	100 },
{id : 63, name : 'Heated Hair Rollers', Wat	:	700 },
{id : 64, name : 'Home Air Conditioner', Wat	:	4000 },
{id : 65, name : 'Home Internet Router', Wat	:	25 },
{id : 66, name : 'Home Phone', Wat	:	30 },
{id : 67, name :  'Home Sound System', Wat	:	195 },
{id : 68, name : 'Hot Water Dispenser', Wat	:	1800 },
{id : 69, name : 'Hot Water Immersion Heater', Wat	:	5000 },
{id : 70, name : 'Humidifier', Wat : 80 },
{id : 71, name : 'iMac',	Wat :	400 },
{id : 72, name : 'Inkjet Printer', Wat	:	200 },
{id : 73, name : 'Inverter Air conditioner', Wat	:	1400 },
{id : 74, name : 'Iron', Wat	:	1800 },
{id : 75, name : 'Jacuzzi', Wat	:	7500 },
{id : 76, name : 'Kitchen Extractor Fan',	Wat :	250 },
{id : 77, name : 'Laptop Computer', Wat	:	140 },
{id : 78, name : 'Laser Printer', Wat	:	800 },
{id : 79, name : 'Lawnmower', Wat	:	1400 },
{id : 80, name : 'LED Christmas Lights', Wat	:	30 },
{id : 81, name : 'LED Light Bulb', Wat	:	30 },
{id : 82, name : 'Mi Box', Wat	:	25 },
{id : 83, name : 'Microwave', Wat	:	2500 },
{id : 84, name : 'Night Light', Wat	:	20 },
{id : 85, name : 'Nintendo Switch AC Adapter', Wat	:	90 },
{id : 86, name : 'Outdoor Hot Tub',	Wat :	1000 },
{id : 87, name : 'Oven',	Wat :	2500 },
{id : 88, name : 'Paper Shredder', Wat	:	320 },
{id : 89, name : 'Pedestal Fan', Wat 	:	60 },
{id : 90, name : 'Philips Hue Smart Bulb', Wat	:	19 },
{id : 91, name : 'Phone Charger', Wat	:	20 },
{id : 92, name : 'Playstation 4',	Wat :	200 },
{id : 93, name : 'Playstation 5', Wat	:	450 },
{id : 94, name : 'Portable Air Conditioner', Wat	:	1200 },
{id : 95, name : 'Pressure Cooker', Wat	:	700 },
{id : 96, name : 'Projector', Wat	:	270 },
{id : 97, name : 'Refrigerator', Wat	:	400 },
{id : 98, name : 'Rice Cooker', Wat	:	1200 },
{id : 99, name : 'Scanner', Wat :	180 },
{id : 100, name : 'Sewing Machine', Wat	:	350 },
{id : 101, name : 'Singer Sewing Machine', Wat : 450 },
{id : 102, name : 'Slow Cooker', Wat	:	480 },
{id : 103, name : 'Smoke Detector', Wat 	:	12 },
{id : 104, name : 'Steam Iron', Wat	:	2500 },
{id : 105, name : 'Steriliser', Wat	:	850 },
{id : 106, name : 'Straightening Iron', Wat	:	400 },
{id : 107, name : 'Table Fan', Wat	:	50 },
{id : 108, name : 'Table Top Fridge', Wat	:	95 },
{id : 109, name : 'Tablet Charger', Wat	:	45 },
{id : 110, name : 'Toaster', Wat 	:	2500 },
{id : 111, name : 'Treadmill', Wat	: 1200 },
{id : 112, name : 'Tube Light (1500mm)', Wat	:	40 },
{id : 113, name : 'TV (19" colour)', Wat	:	200 },
{id : 114, name : 'Vacuum Cleaner', Wat	:	1200 },
{id : 115, name : 'Wall Fan', Wat	:	90 },
{id : 116, name : 'Washing Machine', Wat	:	500 },
{id : 117, name : 'Water Feature', Wat	:	35 },
{id : 118, name : 'Water Filter and Cooler', Wat : 200 },
{id : 119, name : 'WiFi Booster', Wat	:	19 },
{id : 120, name : 'WiFi Router',	 Wat :	25 },
{id : 121, name : 'Window Air Conditioner', Wat	:	1900 },
{id : 122, name : 'Xbox One',  Wat	: 210 }
],

LoadCalculationResource : [
  {id : 1, inverter : 1000, loadWat: 600, battery : 1, type: 1.0},
  {id : 2, inverter : 1200, loadWat: 720, battery : 1, type: 1.2},
  {id : 3, inverter : 2000, loadWat: 1200, battery : 2, type: 2.0},
  {id : 4, inverter : 2400, loadWat: 1440, battery : 2, type: 2.4},
  {id : 5, inverter : 3000, loadWat: 2100, battery : 4, type: 3.0},
  {id : 6, inverter : 3500, loadWat: 2400, battery : 4, type: 3.5},
  {id : 7, inverter : 5000, loadWat: 4000, battery : 8, type: 5.0},
  {id : 8, inverter : 7500, loadWat: 6000, battery : 8, type: 7.5},
  {id : 9, inverter : 10000, loadWat: 8000, battery : 8, type: 10 },
  {id : 10, inverter : 12000, loadWat: 9600, battery : 12, type: 12},
  {id : 11, inverter : 15000, loadWat: 12000, battery : 16, type: 15},
  {id : 12, inverter : 20000, loadWat: 16000, battery : 16, type: 20},
],

isActive: false,
totalLoadWat: null,
solarPanel: null,
inventerType: null,
resultStatus: false,
selectedAppliance: null,
allSelectedAppliance: null,
dropDownActive: false,
user: null,

form : {
  name : null,
  email: '',
  phone: '',
},

      }
    },


    watch: {
    selectedAppliance() {
      this.addSelectedAppliances()
    }
  },

  mounted() {
    this.getSelectedAppliances()
    this.getPreviousFormRecord()
  },


    methods: {

      getPreviousFormRecord()
      {
        let userInfo = JSON.parse(window.localStorage.getItem("user"));
      this.user = userInfo == null ? null : JSON.parse(window.localStorage.getItem("user"));
      },

  modalFlip() {
    this.isActive = !this.isActive;
  },

  dropDownActiveToggle() {
    this.dropDownActive = !this.dropDownActive
  },

  incrementApplianceCounter(id, name, Wat, count) {
    count++
            let item = JSON.parse(window.localStorage.getItem("selectedAppliances")); //get them back
            let index = item.findIndex(obj => obj.id == id)
            item[index].id = id
            item[index].Wat =Wat
            item[index].name = name
            item[index].count = count
            window.localStorage.setItem("selectedAppliances", JSON.stringify(item)); //store cart item
            this.getSelectedAppliances()
    },

    decrementApplianceCounter(id, name, Wat, count) {
      if (count == 1)
            count
            else{
              count--
      }
            let item = JSON.parse(window.localStorage.getItem("selectedAppliances")); //get them back
            let index = item.findIndex(obj => obj.id == id)
            item[index].id = id
            item[index].name = name
            item[index].Wat = Wat
            item[index].count = count
            window.localStorage.setItem("selectedAppliances", JSON.stringify(item)); //store cart item
            this.getSelectedAppliances()
    },

    addSelectedAppliances() {
    let item = JSON.parse(window.localStorage.getItem("selectedAppliances"));
    item = item == null ? [] : JSON.parse(window.localStorage.getItem("selectedAppliances"));
    item.push({id:this.selectedAppliance.id, name:this.selectedAppliance.name, Wat: parseFloat(this.selectedAppliance.Wat), count: 1 })
    window.localStorage.setItem("selectedAppliances", JSON.stringify(item)); //store cart item
    this.getSelectedAppliances()
    },

    removeSelectedAppliances(id) {
    let item = JSON.parse(window.localStorage.getItem("selectedAppliances")); //get them back
    let index = item.findIndex(obj => obj.id == id)
    item.splice(index, 1);
    window.localStorage.setItem("selectedAppliances", JSON.stringify(item)); //store cart item
    this.getSelectedAppliances()
    },

    getSelectedAppliances(){
      this.allSelectedAppliance = JSON.parse(window.localStorage.getItem("selectedAppliances")); //get them back
      let allWat = this.allSelectedAppliance == null ? null : this.allSelectedAppliance.map(obj => obj.count * obj.Wat);
      this.totalLoadWat = allWat == null ? null : allWat.reduce((a, b) => a + b, 0)
      this.getLoadResult()
    },

    getLoadResult()
    {
      let bigCities = [];
      for (let i = 0; i < this.LoadCalculationResource.length; i++) 
    {
      if (this.LoadCalculationResource[i].loadWat >= this.totalLoadWat) {
        bigCities.push(this.LoadCalculationResource[i]);
      }
     }
        this.inventerType = bigCities[0]
        if(this.inventerType == undefined){
        this.inventerType = false
        }
        this.solarPanel = this.inventerType.battery + this.inventerType.battery 
    },

    showResult()
    {
      this.resultStatus = true
      window.localStorage.setItem("user", JSON.stringify(this.form));

      axios.post('https://lovepreneurship.wocasolutions.com/api/energy-mail', {
      name: this.form.name,
      phone : this.form.phone,
      email: this.form.email,
inventer_requested: this.inventerType.type + 'KVA',
solar_panel_requested: this.solarPanel + '280W',
total_load: this.totalLoadWat + 'W',
battery_suggested: this.inventerType.battery + '220amp'
    })
    .then(function (response) {
      console.log(response)
    })
    .catch(function (error) {
      console.log('I just want to cry')
    });
    }

  }

  }).mount('#app')

</script>

  </body>

</html>