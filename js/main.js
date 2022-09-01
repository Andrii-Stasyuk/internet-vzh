
$(window).on("load", function(){
    $('#header').vide('video/vzh',{

    })
});
let index;
let rightMonthes = [];
let arrClosed;
fetch('../close-month.php')
    .then(res=>res.json())
    .then(data=>{
        arrClosed = data['arr'].split(',')
        arrClosed = arrClosed.map(el=>Number(el)).sort((a,b)=>a-b)
    })
localStorage.clear();
const now = new Date();
const day = now.getDate();
const newMonth = now.getMonth()+1;
const newYear = now.getFullYear();
let month = now.getMonth()+1;
let year = now.getFullYear();
let yearClosed = now.getFullYear();
let firstDate;
let secondDate;
let active = [];
let userLastDates=[];
const bookingTableContent = document.querySelector('.booking-table-content');

function closedMonthes() {
    if(arrClosed.some(close=>close==month)){
        bookingTableContent.classList.add('closed-month')
        bookingTableContent.classList.add('none-click')

    } else{
        bookingTableContent.classList.remove('closed-month')
        bookingTableContent.classList.remove('none-click')
    }
}
//  function getUserDates(oldDates){

//    return oldDates.map(el=>el)

//  }

const formUpdate = document.querySelector('.order_up')
function bookedRooms(value){

    const reserves = document.querySelectorAll(`.reserve-active`);
    reserves.forEach(item=>{
        item.classList.remove('date-booked')
    })

    if(value!=0){
        fetch(`../test.php?numOfRoom=${value}`)
            .then(response=>response.json())
            .then(data=>{
                if(data){

                    data.forEach(date=>{

                        const arr = date.split(',')
                        arr.forEach(el=>{

                            if(formUpdate.getAttribute('data-update')){

                                fetch('../update.php')
                                    .then(res=>res.json())
                                    .then(lastDate=>{
                                        const oldDates = lastDate['dates'].split(',');
                                        oldDates.forEach(last=>{

                                            if(el!=last){

                                                const btnUnactive = document.querySelector(`.reserve-active[date="${el}"]`);
                                                //  console.log(btnUnactive)
                                                if(btnUnactive!=null){

                                                    if(!btnUnactive.classList.contains('booking-btn-active')){

                                                        btnUnactive.classList.add('date-booked')
                                                    }
                                                }

                                            } else{


                                                const btn = document.querySelector(`.reserve-active[date="${last}"]`);

                                                if(btn!=null){
                                                    if(!btn.classList.contains('booking-btn-active')){
                                                        btn.classList.remove('date-booked')
                                                        btn.classList.add('booking-btn-active')
                                                        console.log(1245454543)
                                                        tableDateInfo(btn)
                                                    }
                                                }
                                            }
                                        })
                                    })

                            } else{

                                const btnUnactive = document.querySelector(`.reserve-active[date="${el}"]`);
                                if(btnUnactive!=null){

                                    btnUnactive.classList.add('date-booked')
                                }
                            }

                        })



                    })
                }

            })


    }
}
let daysOnLoad;

if(location.pathname.includes('portfolio')){
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        loop: true,
        slidesPerView: 7,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            380: {
                slidesPerView: 2
            },
            640: {
                slidesPerView: 3
            },
            1000: {
                slidesPerView: 4
            }
        }
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });
}
document.addEventListener("click",function (e){
    if(e.target.classList.contains("register-button")){
        document.querySelector('.form-popap').classList.add("form-popap-active")

    }
    if(e.target.classList.contains("login-user-button")){
        document.querySelector('.form-user-login-popap').classList.add("form-user-login-popap-active")
    }

    if(e.target.classList.contains("order-change-btn")){
        document.querySelector('.form-popap-month').classList.add("form-popap-month-active")
        renderMonthTable()
    }
    if(e.target.classList.contains("register-user-button")){
        document.querySelector('.form-user-popap').classList.add("form-user-popap-active")
    }
    if(e.target.classList.contains("register-close")){
        document.querySelector('.form-user-popap').classList.remove("form-user-popap-active")
    }
    if(e.target.classList.contains("popap-month-close")){
        document.querySelector('.form-popap-month').classList.remove("form-popap-month-active")
    }
    if(e.target.classList.contains("fa-times")){
        document.querySelector('.form-popap').classList.remove("form-popap-active")
    }
    if(e.target.classList.contains("login-close")){
        document.querySelector('.form-user-login-popap').classList.remove("form-user-login-popap-active")
    }
    if(e.target.classList.contains("form-popap")){
        document.querySelector('.form-popap').classList.remove("form-popap-active")
    }
} )
const burgerMenu = document.querySelector('.fa-bars'),
    registerButtons = document.querySelector('.register_buttons');

burgerMenu.addEventListener('click', ()=>{
    registerButtons.classList.toggle('register-active-buttons');
})
// document.addEventListener("scroll", function(e){
//     if(document.documentElement.scrollTop > 500){
//
//     }
// })
AOS.init({
    once : true
});
const rooms = [
    {
        numOfPeople : 1 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : 'двохмісний',
    },
    {
        numOfPeople : 2 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : 'двохмісний',
    },
    {
        numOfPeople : 3 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : '2х двохмісний',
    },
    {
        numOfPeople : 4 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : '2х двохмісний',
    },
    {
        numOfPeople : 5 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : '3х двохмісний',
    },
    {
        numOfPeople : 6 ,
        photos : '1.jpg,2.jpg',
        numOfRoom : '3х двохмісний',
    }

];






const showClosedMonth = (reserves)=>{

    fetch('../close-month.php')
        .then(res=>res.json())
        .then(data=>{
            const arr = data['arr'].split(',')

            arr.forEach(closed=>{
                console.log(reserves)
                reserves.forEach(reserve=>{

                    if(closed==reserve.getAttribute('date')){

                        reserve.classList.add('date-month-booked')
                        allMonthArr.push(reserve.getAttribute('date'))
                    }
                })
            })
        })
}

const writeZero = (num)=>{
    if(num<10){
        return `0${num}`
    } else{
        return num
    }
}


const renderMonthTable = () => {
    const wrapper = document.querySelector('.booking-month-table-content');

    wrapper.innerHTML='';
    for(let i = 1; i<=12; i++){
        const div = document.createElement('div');
        div.classList.add('booking-table-day');
        div.innerText = writeZero(i);
        div.classList.add('reserve-month-active')
        div.setAttribute('date', `${i}`)


        wrapper.append(div);
    }
    const reserves = document.querySelectorAll('.reserve-month-active')

    showClosedMonth(reserves)
}
const daysInMonth = (month, year) => {
    return new Date(year, month, 0).getDate();
}

const getDate = (date) => {
    const day = new Date(date).getDate();
    const month = new Date(date).getMonth() + 1;
    const year = new Date(date).getFullYear();
    const innerDate = `${writeZero(day)}-${writeZero(month)}-${year}`;
    return innerDate;
}
let allDateArr= [];
let allMonthArr = [];
const setDate = (btn)=>{
    btn.classList.add('booking-btn-active')
    localStorage.setItem(`id${btn.getAttribute('date')}`, btn.textContent)

    allDateArr.push(btn.getAttribute('date'))
}
localStorage.setItem('dateArr' , JSON.stringify([]));

const tableDateInfo = (btn) => {
    let constMonth;
    const dateNameBlock = document.querySelector('.data-number');
    constMonth = month;
    let dateArr = JSON.parse(localStorage.getItem('dateArr'));
    const priceNum = document.querySelector('.price_number')
    const priceBlock = document.querySelector('.price')
    const day = 86400000;
    const date = btn.getAttribute('date');
    const parsedDate = Date.parse(date);
    let firstDate;
    let secondDate;

    if(dateArr.length === 0){

        dateArr.push(parsedDate);
        setDate(btn)
        firstDate = getDate(parsedDate);
        dateNameBlock.innerHTML = firstDate;

    } else if (dateArr.length === 1) {
        if(dateArr[0] !== parsedDate){

            if(dateArr[0] > parsedDate && (dateArr[0] - parsedDate === day || dateArr[0] - parsedDate===90000000)){

                setDate(btn)
                dateArr.unshift(parsedDate);
                dateNameBlock.innerHTML = `з ${getDate(dateArr[0])} до ${getDate(dateArr[1])}`
            } else if (dateArr[0] < parsedDate && (dateArr[0] - parsedDate === -day || dateArr[0] - parsedDate===-90000000)) {
                setDate(btn)

                dateArr.push(parsedDate);
                dateNameBlock.innerHTML = `з ${getDate(dateArr[0])} до ${getDate(dateArr[1])}`
            }
            firstDate = getDate(dateArr[0]);
            secondDate = getDate(dateArr[1]);

        } else {
            monthNameBlock.innerHTML = `${writeZero(month)} ${year}`
            dateNameBlock.innerHTML=''
            btn.classList.remove('booking-btn-active')
            localStorage.removeItem(`id${btn.getAttribute('date')}`, btn.textContent)
            localStorage.removeItem('currentDate')
            allDateArr = [];
            dateArr = [];
        }
    } else if(dateArr.length === 2) {

        if(dateArr.every(el => el !== parsedDate)){
            if(dateArr[0] > parsedDate && (dateArr[0] - parsedDate === day || dateArr[0] - parsedDate===90000000)){
                setDate(btn)
                dateArr[0] = parsedDate;
                btn.classList.add('booking-btn-active')
            }
            if(dateArr[1] < parsedDate && (dateArr[1] - parsedDate === -day || dateArr[1] - parsedDate===-90000000)){
                setDate(btn)
                btn.classList.add('booking-btn-active')
                dateArr[1] = parsedDate;
            }
            firstDate = getDate(dateArr[0]);
            secondDate = getDate(dateArr[1]);
            dateNameBlock.innerHTML = `з ${firstDate} до ${secondDate}`
        } else {
            btn.classList.remove('booking-btn-active')
            localStorage.removeItem(`id${btn.getAttribute('date')}`, btn.textContent)
            allDateArr = allDateArr.filter(el=>el!=btn.getAttribute('date'))
            if(dateArr[1] - dateArr[0] === day||dateArr[1] - dateArr[0] === 90000000){
                if(dateArr[0] === parsedDate){
                    dateNameBlock.innerHTML = `${getDate(dateArr[1])}`
                } else{
                    dateNameBlock.innerHTML = `${getDate(dateArr[0])}`
                }

                dateArr = dateArr.filter(el => el !== parsedDate);
            } else {
                if(dateArr[0] === parsedDate){
                    const maxDate = Date.parse(new Date(year, month-1, daysOnLoad))

                    if(dateArr[0] + day>maxDate){
                        dateArr[0] = dateArr[0] + 90000000;
                    } else{
                        dateArr[0] = dateArr[0] + day;
                    }


                }
                if(dateArr[1] === parsedDate){
                    const minDate = Date.parse(new Date(year, month-1, 1))
                    if(dateArr[1] - day < minDate){
                        dateArr[1] = dateArr[1] - 90000000;
                    } else{
                        dateArr[1] = dateArr[1] - day;
                    }



                }
                firstDate = getDate(dateArr[0]);
                secondDate = getDate(dateArr[1]);
                dateNameBlock.innerHTML = `з ${firstDate} до ${secondDate}`


            }
        }
    }
    localStorage.setItem('dateArr' , JSON.stringify(dateArr));
    if(dateArr.length!=0){
        localStorage.setItem('currentDate', dateNameBlock.textContent)
    }

    priceBlock.style.display = 'flex';
    console.log(allDateArr)
    fetch('../send-price.php')
        .then(res=>res.json())
        .then(data=>{

            if(dateArr.length<2){

                priceNum.innerText=`Виберіть хоча б 2 дні`;
            } else{

                if(6<=constMonth&&constMonth<=8){
                    console.log(constMonth)
                    if(localStorage.getItem('room')=='двохмісний'){

                        priceNum.innerText=`Ціна всього:   ${Number(data['summer_price'])*(allDateArr.length-1)*1} грн`

                    } else{
                        console.log(Number(data['summer_price']),String(localStorage.getItem('room')))
                        priceNum.innerText=`Ціна всього:   ${Number(data['summer_price'])*(allDateArr.length-1)*String(localStorage.getItem('room'))[0]} грн`
                    }
                } else{
                    if(localStorage.getItem('room')=='двохмісний'){

                        priceNum.innerText=`Ціна всього:   ${Number(data['winter_price'])*(allDateArr.length-1)*1} грн`

                    } else{
                        priceNum.innerText=`Ціна всього:   ${Number(data['winter_price'])*(allDateArr.length-1)*String(localStorage.getItem('room'))[0]} грн`
                    }
                }
            }


        })

}



const filterRooms = (arr, people, elem)=> {
    elem.innerHTML = '<option value="0">Доступні номера</option>';
    const newArr = arr.filter(({numOfPeople})=>numOfPeople==people)
    if(newArr.length>0){
        newArr.forEach(item=>{
            const wrapper = document.createElement('option')
            // wrapper.setAttribute('value', item.numOfRoom)
            wrapper.innerText= item.numOfRoom;
            elem.append(wrapper)

        })
        elem.style.display='block';
    } else{
        elem.style.display='none';
    }
}


let changed;

document.addEventListener('change', (e)=>{
    const target = e.target;
    changed = true;

    if(target.classList.contains('rooms')){
        const bookingTable = document.querySelector('.booking-table');
        bookingTable.style.display = 'block';
        const value = target.value;


        daysOnLoad = daysInMonth(month, year)
        renderBookingTable(daysOnLoad)
        closedMonthes()
        bookedRooms(value)

        localStorage.setItem('room', value)

    }


    if(target.classList.contains('rooms-select')){
        const value = target.value;
        const wrapper = document.querySelector('select[name="rooms"]')
        filterRooms(rooms, value, wrapper)

    }




})
if(formUpdate.getAttribute('data-update')=='update'&&!changed){
    fetch('../update.php')
        .then(res=>res.json())
        .then(data=>{
            const bookingTable = document.querySelector('.booking-table');
            bookingTable.style.display = 'block';
            const value = data['number_of_rooms'];


            let arr = data['dates'].split(',')
            arr = arr.map(el=>Date.parse(el)).sort((a,b)=>a-b)
            month = new Date(arr[0]).getMonth()+1
            year = new Date(arr[0]).getFullYear()
            daysOnLoad = daysInMonth(month, year);
            renderBookingTable(daysOnLoad);
            closedMonthes()
            bookedRooms(value)
            localStorage.setItem('room', value)
            const people = data['number_of_people'];
            const wrapper = document.querySelector('select[name="rooms"]')
            wrapper.style='display: block;'
            const option = document.createElement('option')
            // wrapper.setAttribute('value', item.numOfRoom)
            option.innerText= data['number_of_rooms'];
            wrapper.append(option)
        })
}
let reserveActive;
let allLocalKeys = [];
const dateNameBlock = document.querySelector('.data-number');
const monthNameBlock = document.querySelector('.month-number')
let arrData = [];

const renderBookingTable=(days)=>{
    const wrapper = document.querySelector('.booking-table-content');
    const activeBtns = document.querySelectorAll('.booking-btn-active')
    monthNameBlock.innerHTML = `<p>${writeZero(month)} ${year}</p>`
    wrapper.innerHTML='';


    for(let i = 1; i<=days; i++){
        const div = document.createElement('div');
        div.classList.add('booking-table-day');
        div.innerText = i;

        if(year==newYear && month==newMonth && i<=day){
            div.style.backgroundColor='red';
        } else{

            div.classList.add('reserve-active')
            div.setAttribute('date', new Date(year, month-1, i))

        }


        wrapper.append(div);

    }

    const reserveActiveBtns = document.querySelectorAll('.reserve-active')
    reserveActiveBtns.forEach(item=>{
        if(item.textContent==localStorage.getItem(`id${item.getAttribute('date')}`)){
            item.classList.add('booking-btn-active')
            item.setAttribute('date', new Date(year, month-1, item.textContent))

        }
    })



}

document.addEventListener('click', (e)=>{

    const data = new Date(year, month - 1)
    const dataYear = now.getFullYear()
    if(e.target.classList.contains('reserve-active')){
        tableDateInfo(e.target)
    }
    if(e.target.classList.contains('reserve-month-active')){

        if(e.target.classList.contains('date-month-booked')){
            console.log('active')
            e.target.classList.remove('date-month-booked')
            allMonthArr = allMonthArr.filter(item=>item!=e.target.getAttribute('date'))
            // localStorage.removeItem(`idMonth${e.target.getAttribute('date')}`)

        } else{
            console.log('nonactive')
            e.target.classList.add('date-month-booked')
            // localStorage.setItem(`idMonth${e.target.getAttribute('date')}`, e.target.textContent)
            allMonthArr.push(e.target.getAttribute('date'))

        }


    }

    if(e.target.classList.contains('next')){
        // console.log(rightMonthes[index+1])


        console.log(arrClosed)
        if(month>=12){
            month = 1;
            year = ++year;
        } else{
            month = ++month;

        }


        bookedRooms(localStorage.getItem('room'))
        daysOnLoad = daysInMonth(month, year);
        renderBookingTable(daysOnLoad);
        closedMonthes()
        if(localStorage.getItem('currentDate')){
            dateNameBlock.innerHTML = `<p>${localStorage.getItem('currentDate')}</p>`
        }

    }

    if(e.target.classList.contains('prev')){
        if(data>=now){

            if(month<=1){
                month=12;
                year = --year;
            } else{
                month = --month;
            }
        }
        bookedRooms(localStorage.getItem('room'))
        closedMonthes()

        daysOnLoad = daysInMonth(month, year);
        renderBookingTable(daysOnLoad);
        if(localStorage.getItem('currentDate')){
            dateNameBlock.innerHTML = `<p>${localStorage.getItem('currentDate')}</p>`
        }
    }
    if(e.target.classList.contains('order')){
        const numOfRoom = document.querySelector('select[name="rooms"]').value;

        const formdata = new FormData()
        formdata.set('arr', allDateArr)
        formdata.set('date_str', localStorage.getItem('currentDate'))
        formdata.set('num_of_room', numOfRoom)
        console.log(allDateArr)
        fetch('../test.php' , {
            method : 'post' ,
            body : formdata


        })
        // window.location.href='test.php';

    }
    //  console.log(allDateArr)
    if(e.target.classList.contains('update')){
        //e.preventDefault()
        const numOfRoom = document.querySelector('select[name="rooms"]').value;
        const orderForm = document.querySelector('.black')
        const formdata = new FormData()
        console.log(allDateArr)
        formdata.set('date_str', localStorage.getItem('currentDate'))
        formdata.set('arr', allDateArr)
        formdata.set('num_of_room', numOfRoom)

        fetch('../test.php' , {
            method : 'post' ,
            body : formdata


        })
        // window.location.href='test.php';

    }
    if(e.target.classList.contains('close-month')){
        //  e.preventDefault()
        const formdat = new FormData()

        formdat.set('arr_month', allMonthArr)

        fetch('../close-month.php' , {
            method : 'post' ,
            body : formdat


        })
        // window.location.href='test.php';

    }

})



