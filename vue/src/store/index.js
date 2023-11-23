import{createStore} from "vuex";


const tmpData =[
    {
        "id": 1,
        "county": "Pennsylvania",
        "country": "Cocos (Keeling) Islands",
        "town": "Johnsonbury",
        "description": "Debitis doloribus eos optio debitis. Et accusamus exercitationem blanditiis enim fuga optio vitae. Eligendi temporibus cum blanditiis. Voluptate culpa quos reiciendis doloremque officiis.",
        "full_details_url": "https://p-hold.com/1000/400?57108",
        "displayable_address": "6446 Smitham Ferry Apt. 571",
        "image_url": "https://p-hold.com/1000/400?57108",
        "thumbnail_url": "https://p-hold.com/100/100?54016",
        "latitude": "-64.3049290",
        "longitude": "-154.2199280",
        "num_bedrooms": 1,
        "num_bathrooms": 12,
        "price": "85352",
        "type": "sale",
        "property_type": {
            "id": 4,
            "title": "Terraced",
            "description": "Terraced houses are common in old industrial towns and cities such as Manchester, Bath and areas of central London. Terraced houses became extremely popular to provide high-density accommodation for the working class in the 19th century. Terraced houses are structurally built the same and both sides of each house shares walls with neighbours.",
            "created_at": "2020-01-08 12:55:35",
            "updated_at": null
        }
    },
    {
        "id": 2,
        "county": "Delaware",
        "country": "Guernsey",
        "town": "South Katelyn",
        "description": "In cupiditate fuga et in totam. Enim aut vel atque consequatur et et. Et aperiam eum aliquid rerum facilis ex. Vel maxime reprehenderit ea illum et eos.",
        "full_details_url": "https://p-hold.com/1000/400?49440",
        "displayable_address": "23663 Oberbrunner Bridge Suite 239",
        "image_url": "https://p-hold.com/1000/400?49440",
        "thumbnail_url": "https://p-hold.com/100/100?62816",
        "latitude": "-8.8929900",
        "longitude": "-50.3735560",
        "num_bedrooms": 6,
        "num_bathrooms": 1,
        "price": "1565191",
        "type": "sale",
        "property_type": {
            "id": 1,
            "title": "Flat",
            "description": "rom studio flats, to maisonettes and 2-storey flats, a flat is a living area that is self-contained and in one part of a building. A building is usually split into individual flats and the communal areas are those that are shared e.g. lifts, stairwells, receptions etc.",
            "created_at": "2020-01-08 12:55:35",
            "updated_at": null
        }
    },
    {
        "id": 3,
        "county": "Oregon",
        "country": "Russian Federation",
        "town": "Lake Athenaville",
        "description": "Quod ipsam doloribus repellat omnis similique dolore esse enim. In ut et dolorem mollitia est reprehenderit qui aut. Ex amet suscipit earum. Est aspernatur accusamus est qui sapiente error.",
        "full_details_url": "https://p-hold.com/1000/400?82763",
        "displayable_address": "920 Nellie Ranch",
        "image_url": "https://p-hold.com/1000/400?82763",
        "thumbnail_url": "https://p-hold.com/100/100?53150",
        "latitude": "-10.3512150",
        "longitude": "36.4368700",
        "num_bedrooms": 8,
        "num_bathrooms": 1,
        "price": "129598",
        "type": "sale",
        "property_type": {
            "id": 3,
            "title": "Semi-detached",
            "description": "Semi-detached properties are a lot more common for homeowners to purchase/rent. There are a lot more semi-detached properties in the UK as they save a lot of space as they are houses paired together by a common wall. Semi-detached properties are fantastic options for homeowners to extend at the back and side and have an element of privacy too.",
            "created_at": "2020-01-08 12:55:35",
            "updated_at": null
        }
    },
    {
        "id": 4,
        "county": "Rhode Island",
        "country": "Kyrgyz Republic",
        "town": "North Stewart",
        "description": "Minima qui autem quis non. Consequuntur voluptate exercitationem et delectus eum voluptas. Enim nostrum omnis aperiam ab. Voluptas qui est est odit ut eveniet optio.",
        "full_details_url": "https://p-hold.com/1000/400?17603",
        "displayable_address": "3382 Lincoln Expressway Apt. 647",
        "image_url": "https://p-hold.com/1000/400?17603",
        "thumbnail_url": "https://p-hold.com/100/100?25319",
        "latitude": "52.3242880",
        "longitude": "-152.4294270",
        "num_bedrooms": 10,
        "num_bathrooms": 1,
        "price": "1837110",
        "type": "sale",
        "property_type": {
            "id": 3,
            "title": "Semi-detached",
            "description": "Semi-detached properties are a lot more common for homeowners to purchase/rent. There are a lot more semi-detached properties in the UK as they save a lot of space as they are houses paired together by a common wall. Semi-detached properties are fantastic options for homeowners to extend at the back and side and have an element of privacy too.",
            "created_at": "2020-01-08 12:55:35",
            "updated_at": null
        }
    },
    {
        "id": 5,
        "county": "Colorado",
        "country": "Rwanda",
        "town": "Cronaborough",
        "description": "Quia dolor eos praesentium repellat. Delectus aut voluptatum reiciendis sit excepturi sint. Eveniet qui error dolorem praesentium vero. Modi architecto voluptatum dolor dolorum eos.",
        "full_details_url": "https://p-hold.com/1000/400?32896",
        "displayable_address": "67355 Bosco Knolls Suite 188",
        "image_url": "https://p-hold.com/1000/400?32896",
        "thumbnail_url": "https://p-hold.com/100/100?19556",
        "latitude": "72.6266150",
        "longitude": "73.0234140",
        "num_bedrooms": 1,
        "num_bathrooms": 1,
        "price": "1866398",
        "type": "sale",
        "property_type": {
            "id": 6,
            "title": "Cottage",
            "description": "It says it in the name. It is the end of a terraced house and only one side shares a common wall, while the other is detached.",
            "created_at": "2020-01-08 12:55:35",
            "updated_at": null
        }
    },
];

const store = createStore({
    state:{
        properties:[...tmpData]
    },
    getters:{},
    actions:{},
    mutations:{},
    modules:{}
});

export default store;