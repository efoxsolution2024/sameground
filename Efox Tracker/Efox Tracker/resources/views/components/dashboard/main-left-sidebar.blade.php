<section class="box1 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
    <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">        
        <path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z" fill="#eaa051"/></svg>
    </div>

    <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">websites
      <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $dataCount }}</span>
    </h3>          
</section>

<section class="box2 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
    <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
          
          <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" fill="#eaa051"/></svg>
    </div>
      
    <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">Active
      <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $activeCount }}</span>
    </h3>            
</section>

<section class="box3 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
    <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" fill="#eaa051"/></svg>
    </div>
      
    <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">In Active
      <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $inactiveCount }}</span>
    </h3>            
</section>

<section class="box4 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
    <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" fill="#eaa051"/></svg>
    </div>
      
    <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">NL Media
      <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $newlinkCount }}</span>
    </h3>            
</section>

<section class="box5 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" fill="#eaa051"/></svg>
    </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">W Republic
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $writersCount }}</span>
  </h3>            
</section>

<section class="box6 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M640 299.3V304 432c0 26.5-21.5 48-48 48H512 448 64c-17.7 0-32-14.3-32-32s14.3-32 32-32H448V368H96c-17.7 0-32-14.3-32-32V219.4L33.8 214C14.2 210.5 0 193.5 0 173.7c0-8.9 2.9-17.5 8.2-24.6l35.6-47.5C76.7 57.8 128.2 32 182.9 32c27 0 53.6 6.3 77.8 18.4L586.9 213.5C619.5 229.7 640 263 640 299.3zM448 304V288L128 230.9V304H448z" fill="#eaa051"/></svg>
    </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">M & HUGO
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $miltonCount }}</span>
  </h3>            
</section>

<section class="box7 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M225.9 32C103.3 32 0 130.5 0 252.1 0 256 .1 480 .1 480l225.8-.2c122.7 0 222.1-102.3 222.1-223.9C448 134.3 348.6 32 225.9 32zM224 384c-19.4 0-37.9-4.3-54.4-12.1L88.5 392l22.9-75c-9.8-18.1-15.4-38.9-15.4-61 0-70.7 57.3-128 128-128s128 57.3 128 128-57.3 128-128 128z" fill="#eaa051"/></svg>
      </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">EFOX TMS
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $efoxCount }}</span>
  </h3>            
</section>

<section class="box8 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M274.9 34.3c-28.1-28.1-73.7-28.1-101.8 0L34.3 173.1c-28.1 28.1-28.1 73.7 0 101.8L173.1 413.7c28.1 28.1 73.7 28.1 101.8 0L413.7 274.9c28.1-28.1 28.1-73.7 0-101.8L274.9 34.3zM200 224a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM96 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 376a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM352 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 120a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm96 328c0 35.3 28.7 64 64 64H576c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H461.7c11.6 36 3.1 77-25.4 105.5L320 413.8V448zM480 328a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" fill="#eaa051"/></svg>
      </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">D.I.V.I
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $diviCount }}</span>
  </h3>            
</section>

<section class="box3 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" fill="#eaa051"/></svg>
    </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500">SixteenT
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $sixteenCount }}</span>
  </h3>            
</section>       

<section class="box3 bg-white  rounded-2xl box-border relative overflow-hidden flex justify-evenly">
  <div class="icon w-[23%] relative  top-[22%] bg-amber-100 rounded-2xl p-2 h-12 box-border overflow-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" fill="#eaa051"/></svg>
      </div>
      
  <h3 class="text-left pl-4 font-bold uppercase py-4 text-gray-500"> WR BLP
    <span class="activeCount block text-2xl text-indigo-500 font-semibold text-right mt-3">{{ $wrBLP }}</span>
  </h3>            
</section>  
