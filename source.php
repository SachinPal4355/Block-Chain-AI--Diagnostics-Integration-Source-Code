import random
from sklearn.metrics import precision_score, recall_score, f1_score, accuracy_score

# Blockchain-like data storage for patient diagnostic data (simplified for this example)
class Blockchain:
    def __init__(self):
        self.chain = []
    
    def add_block(self, patient_id, true_label, predicted_label):
        block = {
            'patient_id': patient_id,
            'true_label': true_label,
            'predicted_label': predicted_label
        }
        self.chain.append(block)
    
    def get_data(self):
        return self.chain

# Simulated AI Diagnostic Model
def ai_diagnostic(patient_data):
    # Random prediction for simplicity, can be replaced with actual AI logic
    return random.choice([0, 1])  # 0 = Healthy, 1 = Disease detected

# Generate dummy patient data and true labels (real diagnostic outcomes)
def generate_patient_data(num_patients):
    patient_data = []
    true_labels = []
    for i in range(num_patients):
        patient = {'id': i, 'data': random.random()}  # Dummy patient data
        true_label = random.choice([0, 1])  # True diagnosis
        patient_data.append(patient)
        true_labels.append(true_label)
    return patient_data, true_labels

# Evaluate the accuracy of the system
def evaluate_system(blockchain):
    true_labels = [block['true_label'] for block in blockchain.get_data()]
    predicted_labels = [block['predicted_label'] for block in blockchain.get_data()]
    
    # Accuracy
    accuracy = accuracy_score(true_labels, predicted_labels)
    
    # Precision, Recall, and F1 Score
    precision = precision_score(true_labels, predicted_labels, zero_division=1)
    recall = recall_score(true_labels, predicted_labels, zero_division=1)
    f1 = f1_score(true_labels, predicted_labels, zero_division=1)
    
    # Print the evaluation metrics
    print(f"System Accuracy: {accuracy * 100:.2f}%")
    print(f"Precision: {precision * 100:.2f}%")
    print(f"Recall: {recall * 100:.2f}%")
    print(f"F1 Score: {f1 * 100:.2f}%")
    
    return accuracy, precision, recall, f1

# Simulate the whole process
def main():
    # Initialize the Blockchain
    blockchain = Blockchain()
    
    # Generate dummy patient data and true diagnostic labels
    num_patients = 100
    patient_data, true_labels = generate_patient_data(num_patients)
    
    # AI model makes predictions and stores them on the Blockchain
    for i, patient in enumerate(patient_data):
        ai_prediction = ai_diagnostic(patient['data'])
        blockchain.add_block(patient_id=patient['id'], true_label=true_labels[i], predicted_label=ai_prediction)
    
    # Evaluate the system's performance
    evaluate_system(blockchain)

# Run the simulation
main()

