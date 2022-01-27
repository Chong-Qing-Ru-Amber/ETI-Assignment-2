package main

import (
	"encoding/json"
	"fmt"
	"log"
	"net/http"

	"github.com/gorilla/mux"
)

type BusStopCode struct {
	ID          string `json:"ID"`
	Information string `json:"Information"`
}

var codes []BusStopCode
var params map[string]string
var info []BusStopCode

// home
func home(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Welcome to the REST API!")
}

// get all codes
func getAllCodes(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(codes)
}

// get code with id
func getCode(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	// Loop to find ID
	for _, item := range codes {
		if item.ID == params["id"] {
			json.NewEncoder(w).Encode(item)
			return
		}
	}
	json.NewEncoder(w).Encode(&BusStopCode{})
}

// create detail
func createCode(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	_ = json.NewDecoder(r.Body).Decode(&info)
	codes.ID = varchar(50)
	info = append(codes, code)
	json.NewEncoder(w).Encode(code)
}

func main() {

	router := mux.NewRouter()

	router.HandleFunc("/api/v1/", home)
	router.HandleFunc("/api/v1/BusStops/", getAllCodes).Methods("GET")
	router.HandleFunc("/api/v1/BusStops/{codeid}", getCode).Methods("GET")
	router.HandleFunc("/api/v1/BusStops/{codeid}", createCode).Methods("POST")

	fmt.Println("Listening at port 5330")
	log.Fatal(http.ListenAndServe(":5330", router))
}
