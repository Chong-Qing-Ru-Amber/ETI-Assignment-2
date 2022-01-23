package main

import (
	"encoding/json"
	"fmt"
	"log"
	"math/rand"
	"net/http"

	"github.com/gorilla/mux"
)

// Tutor Struct
type Tutor struct {
	ID          int    `json:"id"`
	Name        string `json"name"`
	Description string `json"description"`
}

func home(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Welcome to the tutor REST API!")
}

var tutors []Tutor

// Get All Tutors
func getTutors(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(tutors)
}

// Get one Tutor
func getTutor(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	// Loop to find ID
	for _, item := range tutors {
		if item.ID == params["id"] {
			json.NewEncoder(w).Encode(item)
			return
		}
	}
	json.NewEncoder(w).Encode(&Tutor{})
}

// Create New Tutor
func createTutor(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	var tutor Tutor
	_ = json.NewDecoder(r.Body).Decode(&tutor)
	tutor.ID = rand.Intn(10000000)
	tutors = append(tutors, tutor)
	json.NewEncoder(w).Encode(tutor)
}

// Update Tutor
func updateTutor(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	for index, item := range tutors {
		if item.ID == params["id"] {
			tutors = append(tutors[:index], tutors[index+1:]...)
			var tutor Tutor
			_ = json.NewDecoder(r.Body).Decode(&tutor)
			tutor.ID = params["id"]
			tutors = append(tutors, tutor)
			json.NewEncoder(w).Encode(tutor)
			return
		}
	}
	json.NewEncoder(w).Encode(tutors)
}

// Delete Tutor
func deleteTutor(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	for index, item := range tutors {
		if item.ID == params["id"] {
			tutors = append(tutors[:index], tutors[index+1:]...)
			break
		}
	}
	json.NewEncoder(w).Encode(tutors)
}

func main() {
	// Router
	r := mux.NewRouter()

	// Route Handlers / Endpoints
	r.HandleFunc("/api/v1", home)
	r.HandleFunc("/api/v1/tutor/", getTutors).Methods("GET")
	r.HandleFunc("/api/v1/tutor/{id}", getTutor).Methods("GET")
	r.HandleFunc("/api/v1/tutor", createTutor).Methods("POST")
	r.HandleFunc("/api/v1/tutor/{id}", updateTutor).Methods("PUT")
	r.HandleFunc("/api/v1/tutor/{id}", deleteTutor).Methods("DELETE")

	log.Fatal(http.ListenAndServe(":8233", r))
}
