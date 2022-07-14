const v_location_voivodship = document.querySelector("#v_location_voivodship");
const v_district = document.querySelector("#v_district");



const dolnośląskie = ['bolesławiecki', 'dzierżoniowski', 'głogowski', 'górowski', 'jaworski', 'Jelenia Góra', 'kamiennogórski', 'karkonoski', 'kłodzki', 'Legnica', 'legnicki', 'lubański', 'lubiński', 'lwówecki', 'milicki', 'oleśnicki', 'oławski', 'polkowicki', 'strzeliński', 'średzki', 'świdnicki', 'trzebnicki', 'Wałbrzych', 'wałbrzyski', 'wołowski', 'Wrocław', 'wrocławski', 'ząbkowicki', 'zgorzelecki', 'złotoryjski',]




const kujawsko_pomorskie = ['aleksandrowski', 'brodnicki', 'bydgoski', 'Bydgoszcz', 'chełmiński', 'golubsko-dobrzyński', 'Grudziądz', 'grudziądzki', 'inowrocławski', 'lipnowski', 'mogileński', 'nakielski', 'radziejowski', 'rypiński', 'sępoleński', 'świecki', 'Toruń', 'toruński', 'tucholski', 'wąbrzeski', 'Włocławek', 'włocławski', 'żniński',]



const lubelskie = [
    'bialski', 'Biała Podlaska', 'biłgorajski', 'Chełm', 'chełmski', 'hrubieszowski', 'janowski', 'krasnostawski', 'kraśnicki', 'lubartowski', 'lubelski', 'Lublin', 'łęczyński', 'łukowski', 'opolski', 'parczewski', 'puławski', 'radzyński', 'rycki', 'świdnicki', 'tomaszowski', 'włodawski', 'zamojski', 'Zamość',
]


const lubuskie = [
    'gorzowski', 'Gorzów Wielkopolski', 'krośnieński', 'międzyrzecki', 'nowosolski', 'słubicki', 'strzelecko-drezdenecki', 'sulęciński', 'świebodziński', 'wschowski', 'Zielona Góra', 'zielonogórski', 'żagański', 'żarski',
]


const łódzkie = [
    'bełchatowski', 'brzeziński', 'kutnowski', 'łaski', 'łęczycki', 'łowicki', 'łódzki wschodni', 'Łódź', 'opoczyński', 'pabianicki', 'pajęczański', 'piotrkowski', 'Piotrków Trybunalski', 'poddębicki', 'radomszczański', 'rawski', 'sieradzki', 'Skierniewice', 'skierniewicki', 'tomaszowski', 'wieluński', 'wieruszowski', 'zduńskowolski', 'zgierski',
]


const małopolskie = [
    'bocheński', 'brzeski', 'chrzanowski', 'dąbrowski', 'gorlicki', 'krakowski', 'Kraków', 'limanowski', 'miechowski', 'myślenicki', 'nowosądecki', 'nowotarski', 'Nowy Sącz', 'olkuski', 'oświęcimski', 'proszowicki', 'suski', 'tarnowski', 'Tarnów', 'tatrzański', 'wadowicki', 'wielicki',
]



const mazowieckie = [
    'białobrzeski', 'ciechanowski', 'garwoliński', 'gostyniński', 'grodziski', 'grójecki', 'kozienicki', 'legionowski', 'lipski', 'łosicki', 'makowski', 'miński', 'mławski', 'nowodworski', 'ostrołęcki', 'Ostrołęka', 'ostrowski', 'otwocki', 'piaseczyński', 'Płock', 'płocki', 'płoński', 'pruszkowski', 'przasnyski', 'przysuski', 'pułtuski', 'Radom', 'radomski', 'Siedlce', 'siedlecki', 'sierpecki', 'sochaczewski', 'sokołowski', 'szydłowiecki', 'Warszawa', 'warszawski zachodni', 'węgrowski', 'wołomiński', 'wyszkowski', 'zwoleński', 'żuromiński', 'żyrardowski',
]




const opolskie = [
    'brzeski', 'głubczycki', 'kędzierzyńsko-kozielski', 'kluczborski', 'krapkowicki', 'namysłowski', 'nyski', 'oleski', 'Opole', 'opolski', 'prudnicki', 'strzelecki',

]




const podkarpackie = [
    'bieszczadzki', 'brzozowski', 'dębicki', 'jarosławski', 'jasielski', 'kolbuszowski', 'Krosno', 'krośnieński', 'leski', 'leżajski', 'lubaczowski', 'łańcucki', 'mielecki', 'niżański', 'przemyski', 'Przemyśl', 'przeworski', 'ropczycko-sędziszowski', 'rzeszowski', 'Rzeszów', 'sanocki', 'stalowowolski', 'strzyżowski', 'Tarnobrzeg', 'tarnobrzeski',
]



const podlaskie = [

    'augustowski', 'białostocki', 'Białystok', 'bielski', 'grajewski', 'hajnowski', 'kolneński', 'Łomża', 'łomżyński', 'moniecki', 'sejneński', 'siemiatycki', 'sokólski', 'suwalski', 'Suwałki', 'wysokomazowiecki', 'zambrowski',
]



const pomorskie = [
    'bytowski', 'chojnicki', 'człuchowski', 'Gdańsk', 'gdański', 'Gdynia', 'kartuski', 'kościerski', 'kwidzyński', 'lęborski', 'malborski', 'nowodworski', 'pucki', 'Słupsk', 'słupski', 'Sopot', 'starogardzki', 'sztumski', 'tczewski', 'wejherowski',
]


const śląskie = [
    'będziński', 'bielski', 'Bielsko-Biała', 'bieruńsko-lędziński', 'Bytom', 'Chorzów', 'cieszyński', 'Częstochowa', 'częstochowski', 'Dąbrowa Górnicza', 'Gliwice', 'gliwicki', 'Jastrzębie-Zdrój', 'Jaworzno', 'Katowice', 'kłobucki', 'lubliniecki', 'mikołowski', 'Mysłowice', 'myszkowski', 'Piekary Śląskie', 'pszczyński', 'raciborski', 'Ruda Śląska', 'rybnicki', 'Rybnik', 'Siemianowice Śląskie', 'Sosnowiec', 'Świętochłowice', 'tarnogórski', 'Tychy', 'wodzisławski', 'Zabrze', 'zawierciański', 'Żory', 'żywiecki',
]


const świętokrzyskie = [
    'buski', 'jędrzejowski', 'kazimierski', 'Kielce', 'kielecki', 'konecki', 'opatowski', 'ostrowiecki', 'pińczowski', 'sandomierski', 'skarżyski', 'starachowicki', 'staszowski', 'włoszczowski',
]


const warmińsko_mazurskie = [
    'bartoszycki', 'braniewski', 'działdowski', 'Elbląg', 'elbląski', 'ełcki', 'giżycki', 'gołdapski', 'iławski', 'kętrzyński', 'lidzbarski', 'mrągowski', 'nidzicki', 'nowomiejski', 'olecki', 'Olsztyn', 'olsztyński', 'ostródzki', 'piski', 'szczycieński', 'węgorzewski',
]






const wielkopolskie = [
    'chodzieski', 'czarnkowsko-trzcianecki', 'gnieźnieński', 'gostyński', 'grodziski', 'jarociński', 'kaliski', 'Kalisz', 'kępiński', 'kolski', 'Konin', 'koniński', 'kościański', 'krotoszyński', 'leszczyński', 'Leszno', 'międzychodzki', 'nowotomyski', 'obornicki', 'ostrowski', 'ostrzeszowski', 'pilski', 'pleszewski', 'Poznań', 'poznański', 'rawicki', 'słupecki', 'szamotulski', 'średzki', 'śremski', 'turecki', 'wągrowiecki', 'wolsztyński', 'wrzesiński', 'złotowski',
]



const zachodnio_pomorskie = [
    'białogardzki', 'choszczeński', 'drawski', 'goleniowski', 'gryficki', 'gryfiński', 'kamieński', 'kołobrzeski', 'Koszalin', 'koszaliński', 'łobeski', 'myśliborski', 'policki', 'pyrzycki', 'sławieński', 'stargardzki', 'Szczecin', 'szczecinecki', 'świdwiński', 'Świnoujście', 'wałecki',
]



function appendDistrict(name) {
    var district_names = ``;
    console.log(name)
    for (let i = 0; i < name.length; i++) {
        district_names += `<option value="${name[i]}">${name[i]}</option>`
    }
    v_district.innerHTML = district_names
}


v_location_voivodship.addEventListener("change", function () {

    if (v_location_voivodship.value == 'dolnośląskie') {
        v_district.innerHTML = '';
        appendDistrict(dolnośląskie)
    } else if (v_location_voivodship.value == 'kujawsko-pomorskie') {
        v_district.innerHTML = '';
        appendDistrict(kujawsko_pomorskie)
    } else if (v_location_voivodship.value == 'lubelskie') {
        v_district.innerHTML = '';
        appendDistrict(lubelskie)
    } else if (v_location_voivodship.value == 'lubuskie') {
        v_district.innerHTML = '';
        appendDistrict(lubuskie)
    } else if (v_location_voivodship.value == 'łódzkie') {
        v_district.innerHTML = '';
        appendDistrict(łódzkie)
    } else if (v_location_voivodship.value == 'małopolskie') {
        v_district.innerHTML = '';
        appendDistrict(małopolskie)
    } else if (v_location_voivodship.value == 'opolskie') {
        v_district.innerHTML = '';
        appendDistrict(opolskie)
    } else if (v_location_voivodship.value == 'podkarpackie') {
        v_district.innerHTML = '';
        appendDistrict(podkarpackie)
    } else if (v_location_voivodship.value == 'podlaskie') {
        v_district.innerHTML = '';
        appendDistrict(podlaskie)
    } else if (v_location_voivodship.value == 'pomorskie') {
        v_district.innerHTML = '';
        appendDistrict(pomorskie)
    } else if (v_location_voivodship.value == 'śląskie') {
        v_district.innerHTML = '';
        appendDistrict(śląskie)
    } else if (v_location_voivodship.value == 'świętokrzyskie') {
        v_district.innerHTML = '';
        appendDistrict(świętokrzyskie)
    } else if (v_location_voivodship.value == 'warmińsko-mazurskie') {
        v_district.innerHTML = '';
        appendDistrict(warmińsko_mazurskie)
    } else if (v_location_voivodship.value == 'wielkopolskie') {
        v_district.innerHTML = '';
        appendDistrict(wielkopolskie)
    } else if (v_location_voivodship.value == 'zachodnio-pomorskie') {
        v_district.innerHTML = '';
        appendDistrict(zachodnio_pomorskie)
    } else {
        v_district.innerHTML = '';
    }
})









const v_type = document.querySelector("#v_type");
const v_brand = document.querySelector("#v_brand");
const v_model = document.querySelector("#v_model");


const carFiat = ['1100/103', '1200', '1200/1500/1600 Cabriolet', '124', '124 Spider', '124 Sport Coupé', '124 Sport Spider', '125', '126', '127', '128', '130', '1300', '131', '132', '133', '1400', '147', '1500', '1800', '1900', '2100', '2300', '500', '600', '850', '8V', 'Albea', 'Argenta', 'Barchetta', 'Bravo', 'Bravo/Brava', 'Campagnola', 'Cinquecento', 'Coupé', 'Croma', 'Croma II', 'Dino', 'Duna/Prêmio/Elba', 'Fullback', 'Grand Siena', 'Idea', 'Linea', 'Marea', 'Multipla', 'Oggi', 'Palio', 'Panda', 'Panorama', 'Punto', 'Punto', 'Regata', 'Ritmo/Strada', 'Scudo', 'Sedici', 'Seicento', 'Siena', 'Stilo', 'Tempra', 'Tipo', 'Ulysse', 'Uno', 'Viaggio', 'X1/9', 'other']

const carMercedes = ['C Coupe', 'CL', 'CLA', 'CLC', 'CLS', 'E Coupe', 'EQ*', 'GL', 'GLA', 'GLB', 'GLC', 'GLE', 'GLK', 'GLS', 'Klasa A', 'Klasa B', 'Klasa C', 'Klasa E', 'Klasa G', 'Klasa S', 'Klasa R', 'ML', 'S Coupe', 'SLC', 'SLK', 'other'];


const vansMercedes = ['Citan', 'MB100', 'Sprinter', 'TN', 'Vito', 'other']

const vansPeugeot = ['J5', 'J7', 'J9', 'Bipper', 'Partner I', 'Partner II', 'Partner III', 'Expert I', 'Expert II', 'Expert III', 'Boxer I', 'Boxer II', 'other']


const motorbikesSuzuki = ['A 100', 'DL 1000', 'DL 650', 'EN 125', 'FXR 150', 'GSF Bandit', 'GSX1100F Katana', 'GN 125', 'GN 250', 'GN 400', 'Goose 350', 'GP 100', 'GR Tempter', 'GS 1000', 'GS 1100', 'GS 1150', 'GS 125', 'GS 250', 'GS 300', 'GS 400', 'GS 450', 'GS 500', 'GS 550', 'GS 650', 'GS 700', 'GS 750', 'GS 850', 'GSV-R', 'GSX 1100', 'GSX 1100G', 'GSX 1200', 'GSX 1400', 'GSX 250 Across', 'GSX 400', 'GSX 400 F', 'GSX 550', 'GSX 600F', 'GSX 750', 'GSX 750F', 'GSX-R 1000', 'GSX-R 1100', 'GSX-R 250', 'GSX-R 400', 'GSX-R 50', 'GSX-R 600', 'GSX-R 750', 'GSX-R 1300 Hayabusa', 'GT 125', 'GT 185', 'GT 200', 'GT 250', 'GT 380', 'GT 500', 'GT 550', 'GT 750', 'GT 80', 'GW 250', 'GV 1400', 'other']

const motorbikesWSK = ['Barron 125', 'M06', 'M06 B1', 'M06 B3', 'M06 B3 Bąk', 'M06 B3 Gil', 'M06 B3 Kos', 'M06 B3 Kraska', 'M06 B3 Lelek', 'M06 L', 'M06 Z', 'M06 Z2', 'M06-64', 'M21W2', 'M21W2 Dudek', 'M21W2 Ex', 'M21W2 Kobuz', 'M21W2 Perkoz', 'M21W2 S2', 'M21W2 Sport', 'M21W2 Sport Ex', 'other']


const quadsHonda = ['TRX 250 TM', 'TRX 680FA', 'TRX 500 FA Foreman', 'TRX 680 Rincon', 'TRX 90', 'TRX 420FA', 'other']


const quadsSuzuki = ['Eiger 400 4X4', 'KingQuad 400 AS ', 'KingQuad 400AS Camo', 'KingQuad 400FS', 'KingQuad 400FS Camo', 'KingQuad 450AXi', 'KingQuad 450AXi 4x4 Camo', 'KingQuad 500AXi', 'KingQuad 500AXi Power Steering', 'KingQuad 700', 'KingQuad 750AXi', 'KingQuad 750AXi Camo', 'KingQuad 750AXi Limited', 'KingQuad 750AXi Power Steering', 'KingQuad 750AXi Rockstar', 'LT-R 450 QuadRacer', 'Ozark 250', 'QuadRacer R450', 'QuadRacer R450 Limited Edition', 'QuadSport Z250', 'QuadSport Z400', 'QuadSport Z400 Limited', 'QuadSport Z50', 'QuadSport Z50 Special Edition ', 'QuadSport Z90', 'QuadSport Z90 Special Edition ', 'other', 'other']


const lorriesJelcz = ['315', '316', '317', '325', '415', '416', '417', '420', '422', '423', '620', '622', '640', '842', 'Żubr A80', 'other', 'other']


const lorriesMercedes = ['Actros', 'Antos', 'Atego', 'Arocs', 'Axor', 'Econic', 'L3000', 'T2', 'Unimog', 'Vario', 'Zetros']

const busesJelcz = ['014 Lux', '021', '039', '043', '080', '120M', '120M', '120M/3', '120MB', '120MD', '120MM', '120MM/1', '120MM/1', '120MM/2', '120MV', '272 MEX', 'AP-02', 'D120', 'L081MB Vero', 'L11', 'L11', 'L120', 'M070', 'M081MB Vero', 'M083C Libero', 'M101I Salus', 'M11', 'M120I Supero', 'M120M/4 Supero CNG', 'M120NM', 'M121I Mastero', 'M121M', 'M121MB', 'M125M Vecto', 'M125M/4 CNG Vecto', 'M180', 'M181M', 'M181MB', 'M181MB3 Tantus', 'M182MB', 'MAT Oławka', 'PR100', 'PR110', 'PR110D', 'PR110D', 'PR110MM', 'T081MB Vero', 'T120', 'T120', 'T120/3', 'T120M', 'T120MB', 'other']


const busesMercedes = ['Trac 65/70', 'Trac 700', 'Trac 800', 'Trac 900', 'Trac 1000', 'Trac 1100', 'Trac 1300', 'Trac 1400', 'Trac 1500', 'Trac 1600', 'Trac 1800', 'other']


const agriculturalUrsus = ['1002', '1004', '1012', '1014', '1032', '1034', '1132', '1134', '1201', '1204', '1222', '1224', '1234', '1434', '1604', '1614', '1634', '1674 Forte', '2812', '3512', '3514', '3702', '3702 Piko', '3722', '3724', '3724 Piko', '4512', '4514', '5312', '5314', '532', '534', '5524 Mido', '5712', '5714', '6012', '6014', '6614', '6824 Mido', '912', '914', '932', '934', 'C-308', 'C-3110', 'C-325', 'C-328', 'C-330', 'C-330M', 'C-335', 'C-335M', 'C-350', 'C-355', 'C-355M', 'C-360', 'C-360-3P', 'C-362', 'C-385', 'C-385A', 'C-4011', 'C-45', 'C-451', 'M87U', 'MF 235', 'MF 255', 'MF 265', 'MF 275', 'MF 535', 'MF 555', 'MF 565', 'MF 575', 'MF 590', 'other']


function appendVehicleModal(brandName) {
    var vehicle_options = ``;
    console.log(brandName)
    for (let i = 0; i < brandName.length; i++) {
        vehicle_options += `<option value="${brandName[i]}">${brandName[i]}</option>`
    }
    v_model.innerHTML = vehicle_options
}
        document.querySelector("#add_other_brand").addEventListener("click", () => {
            console.log("dflkjsdlkfj")
            // evt.preventDefault()
            let otherValue = document.querySelector("#v_other_brand_value").value;
            console.log(otherValue)
            if (otherValue) {
                let other = `<option value="${otherValue}">${otherValue}</option>`;
                v_brand.innerHTML = other;
            }
        })
    

v_brand.addEventListener("change", function () {

    if (v_brand.value == 'other') {
        document.querySelector("#v_other_brand_container").style.display = 'block';
    } else
        if (v_type.value == 'cars' && v_brand.value == 'Fiat') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(carFiat)
        } else if (v_type.value == 'cars' && v_brand.value == 'Mercedes') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(carMercedes)
        } else if (v_type.value == 'vans' && v_brand.value == 'Mercedes') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(vansMercedes)
        } else if (v_type.value == 'vans' && v_brand.value == 'Peugeot') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(vansPeugeot)
        } else if (v_type.value == 'motorbikes' && v_brand.value == 'Suzuki') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(motorbikesSuzuki)
        } else if (v_type.value == 'motorbikes' && v_brand.value == 'WSK') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(motorbikesWSK)
        } else if (v_type.value == 'quads' && v_brand.value == 'Honda') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(quadsHonda)
        } else if (v_type.value == 'quads' && v_brand.value == 'Suzuki') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(quadsSuzuki)
        } else if (v_type.value == 'lorries' && v_brand.value == 'Jelcz') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(lorriesJelcz)
        } else if (v_type.value == 'lorries' && v_brand.value == 'Mercedes') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(lorriesMercedes)
        } else if (v_type.value == 'buses' && v_brand.value == 'Jelcz') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(busesJelcz)
        } else if (v_type.value == 'buses' && v_brand.value == 'Mercedes') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(busesMercedes)
        } else if (v_type.value == 'agricultural' && v_brand.value == 'Ursus') {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal(agriculturalUrsus)
        } else {
                    document.querySelector("#v_other_brand_container").style.display = 'none';

            v_model.innerHTML = '';
            appendVehicleModal([])
        }
})








const cars = ['Abarth', 'Alfa', 'Romeo', 'Aston', 'Martin', 'Audi', 'Bentley', 'BMW', 'Buick', 'Cadillac', 'Chevrolet', 'Chrysler', 'Citroen', 'Dacia', 'Daewoo', 'Daihatsu', 'Datsun', 'Dodge', 'Ferrari', 'Fiat', 'Ford', 'Honda', 'Hyundai', 'Infiniti', 'Isuzu', 'Jaguar', 'Jeep', 'Kia', 'Lada', 'Lamborghini', 'Lancia', 'Land', 'Rover', 'Lexus', 'Lotus', 'Maserati', 'Mazda', 'Mercedes', 'MG', 'Mikrus', 'Mini', 'Mitsubishi', 'Moskwicz', 'Nissan', 'Oldsmobile', 'Opel', 'Peugeot', 'Polonez', 'Pontiac', 'Porsche', 'Renault', 'Rolls', 'Royce', 'Rover', 'Saab', 'San', 'Seat', 'Skoda', 'Smart', 'Subaru', 'Suzuki', 'Syrena', 'Tata', 'Tatra', 'Tesla', 'Toyota', 'Trabant', 'Vauxhall', 'Volkswagen', 'Volvo', 'Warszawa', 'Wartburg', 'Wołga', 'Zaporożec']

const motorbikes = ['Accura', 'Aprilia', 'Bajaj', 'BMW', 'Dniepr', 'Ducati', 'Harley', 'Davidson', 'Honda', 'Husqvarna', 'Indian', 'Jawa', 'Junak', 'Kawasaki', 'Komaki', 'KTM', 'Moto', 'Guzzi', 'MZ', 'Okinawa', 'TVS', 'Peugeot', 'Piaggio', 'Sokół', 'Suzuki', 'SVM', 'Triumph', 'Vespa', 'Yamaha', 'Yukie', 'WSK']

const quads = ['Arctic', 'Honda', 'Inca', 'Kingway', 'KTM', 'Kymco', 'Linhai', 'Romet', 'Polaris', 'Suzuki', 'WSK', 'Yamaha', 'Zumico']

const lorries = ['Avia', 'Belaz', 'Berliet', 'DAF', 'Fiat', 'Ford', 'GMC', 'Hyundai', 'Isuzu', 'Iveco', 'Jelcz', 'Kalmar', 'Kamaz', 'Kenworth', 'LIAZ', 'Magirus', 'MAN', 'Mercedes', 'Opel', 'Pegaso', 'Peugeot', 'Renault', 'Scania', 'Skoda', 'Star', 'Steyr', 'Tata', 'Tatra', 'TVS', 'Ural', 'Volvo', 'ZIL']

const buses = ['Autosan', 'Avia', 'Berliet', 'Daewoo', 'DAF', 'Fiat', 'GMC', 'Hyundai', 'Ikarus', 'Isuzu', 'Iveco', 'Jelcz', 'Kia', 'Leyland', 'Motors', 'LIAZ', 'MAN', 'MAZ', 'Mercedes', 'Neoplan', 'Nissan', 'Pegaso', 'Renault', 'San', 'Sanos', 'Scania', 'Solaris', 'Steyr-Daimler-Puch', 'Tata', 'Toyota', 'Ursus', 'Volvo']

const agricultural = ['AGCO', 'Allis Chalmers', 'Belarus', 'Bobcat', 'Branson', 'Case', 'Case IH', 'Caterpillar', 'Challenger', 'Chamberlain', 'Chery', 'Claas', 'Deere', 'Deutz', 'Deutz-Fahr', 'Fiat', 'Ford', 'Hitachi', 'International Harvester', 'Iseki', 'John Deere', 'Kubota', 'LS', 'Lamborghini', 'Landini', 'Massey Ferguson', 'Mercedes', 'Mitsubishi', 'Renault', 'Steyr', 'Terrion', 'Ursus', 'Zetor']
const other = [];

function appendVehicleBrand(carName) {
    var cars_options = ``;
    for (let i = 0; i < carName.length; i++) {
        cars_options += `<option value="${carName[i]}">${carName[i]}</option>`
    }
    v_brand.innerHTML = cars_options
}

v_type.addEventListener("change", () => {
    if (v_type.value == 'cars') {
        v_brand.innerHTML = '';
        appendVehicleBrand(cars)
    } else if (v_type.value == 'motorbikes') {
        v_brand.innerHTML = '';

        appendVehicleBrand(motorbikes)
    } else if (v_type.value == 'quads') {
        v_brand.innerHTML = '';

        appendVehicleBrand(quads)
    } else if (v_type.value == 'lorries') {
        v_brand.innerHTML = '';

        appendVehicleBrand(lorries)
    } else if (v_type.value == 'buses') {
        v_brand.innerHTML = '';

        appendVehicleBrand(buses)
    } else if (v_type.value == 'agricultural') {
        v_brand.innerHTML = '';

        appendVehicleBrand(agricultural)
    } else {
        v_brand.innerHTML = '';

        appendVehicleBrand(other)
    }

})